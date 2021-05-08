<?php


namespace Mufin\IDokladBundle\Service;


use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializerInterface;
use Mufin\IDokladBundle\Exception\ApiRateExceededException;
use Mufin\IDokladBundle\Exception\BadRequestException;
use Mufin\IDokladBundle\Exception\iDokladServerException;
use Mufin\IDokladBundle\Exception\NoActiveSubscriptionException;
use Mufin\IDokladBundle\Exception\UnauthorizedException;
use Mufin\IDokladBundle\Helper\BundleRequestInterface;
use Mufin\IDokladBundle\Helper\iDokladResponse;
use Mufin\IDokladBundle\Helper\iDokladResponseInterface;
use Mufin\IDokladBundle\Serializer\SerializerBuilder;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class IDokladClient
{
    private const BASE_URI = 'https://api.idoklad.cz/v3/';

    private const SERIALIZATION_FORMAT = 'json';

    private iDokladConnector $iDokladAuthenticator;

    private HttpClientInterface $httpClient;

    private SerializerInterface $serializer;

    private ?string $token;

    public function __construct(array $params)
    {
        $this->iDokladAuthenticator = new IDokladConnector($params);
        $this->httpClient = HttpClient::createForBaseUri(self::BASE_URI);
        $this->serializer = SerializerBuilder::build();
    }

    public function sendRequest(BundleRequestInterface $request): iDokladResponseInterface
    {
        if (!isset($this->token)) {
            $this->authenticate();
        }

        $json = $this->makeRequest($request);
        $deserializationContext = DeserializationContext::create()
            ->setAttribute(iDokladResponse::CONTEXT_RESPONSE_CLASS, $request->getResponseObjectClass());

        /** @var iDokladResponseInterface */
        return $this->serializer->deserialize(
            $json,
            iDokladResponse::class,
            self::SERIALIZATION_FORMAT,
            $deserializationContext
        );
    }

    /**
     * @throws RedirectionExceptionInterface
     * @throws TransportExceptionInterface
     * @throws ApiRateExceededException
     * @throws BadRequestException
     * @throws iDokladServerException
     * @throws NoActiveSubscriptionException
     * @throws UnauthorizedException
     */
    private function makeRequest(BundleRequestInterface $request): string
    {
        $response = $this->httpClient->request(
            $request->getHttpMethod(),
            $request->getEndpoint(),
            [
                'body' => $this->serializeRequest($request),
                'auth_bearer' => $this->token,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]
        );

        try {
            return $response->getContent();
        } catch (ServerExceptionInterface $exception) {
            throw new iDokladServerException();
        } catch (ClientExceptionInterface $exception) {
            $content = $exception->getResponse()->getContent(false);

            switch ($exception->getCode()) {
                case Response::HTTP_BAD_REQUEST:
                    throw new BadRequestException($content);
                case Response::HTTP_UNAUTHORIZED:
                    throw new UnauthorizedException();
                case Response::HTTP_PAYMENT_REQUIRED:
                    throw new NoActiveSubscriptionException();
                case Response::HTTP_TOO_MANY_REQUESTS:
                    throw new ApiRateExceededException();
                default:
                    throw new BadRequestException($content);
            }
        }
    }

    private function authenticate(): void
    {
        $authenticationResponse = $this->iDokladAuthenticator->authenticate();
        $this->token = $authenticationResponse->getAccessToken();
    }

    private function serializeRequest(BundleRequestInterface $request): string
    {
        return $this->serializer->serialize($request, self::SERIALIZATION_FORMAT);
    }
}