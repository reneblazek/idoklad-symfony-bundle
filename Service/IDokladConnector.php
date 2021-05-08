<?php

namespace Mufin\IDokladBundle\Service;


use JMS\Serializer\SerializerInterface;
use Mufin\IDokladBundle\Exception\AuthException;
use Mufin\IDokladBundle\Exception\iDokladServerException;
use Mufin\IDokladBundle\Model\Auth\AuthRequest;
use Mufin\IDokladBundle\Model\Auth\AuthResponse;
use Mufin\IDokladBundle\Serializer\SerializerBuilder;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class IDokladConnector
{
    private $params;

    private const SERIALIZATION_FORMAT = 'json';

    private string $clientId;

    private string $clientSecret;

    private HttpClientInterface $httpClient;

    private SerializerInterface $serializer;

    public function __construct(array $params)
    {
        $this->clientId = $params["clientId"];
        $this->clientSecret = $params["clientSecret"];
        $this->httpClient = HttpClient::create();
        $this->serializer = SerializerBuilder::build();
    }

    public function authenticate(): AuthResponse
    {
        $request = new AuthRequest($this->clientId, $this->clientSecret);
        $response = $this->httpClient->request(
            $request->getHttpMethod(),
            $request->getEndpoint(),
            [
                'body' => $request->__toArray(),
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
            ]
        );

        if ($response->getStatusCode() !== Response::HTTP_OK) {
            if ($response->getStatusCode() === Response::HTTP_BAD_REQUEST) {
                throw new AuthException();
            }

            throw new iDokladServerException();
        }

        // TODO: Remove @var annotation when updating jms/serializer to ^3.0

        /** @var AuthResponse */
        return $this->serializer->deserialize(
            $response->getContent(false),
            $request->getResponseObjectClass(),
            self::SERIALIZATION_FORMAT
        );
    }

}