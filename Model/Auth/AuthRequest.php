<?php


namespace Mufin\IDokladBundle\Model\Auth;


use Mufin\IDokladBundle\Helper\BundleRequestInterface;
use Symfony\Component\HttpFoundation\Request;

class AuthRequest implements BundleRequestInterface
{
    public const HTTP_METHOD = Request::METHOD_POST;

    public const ENDPOINT = 'https://identity.idoklad.cz/server/connect/token';

    private const GRANT_TYPE = 'client_credentials';

    private const SCOPES = ['idoklad_api'];

    private const RESPONSE_CLASS = AuthResponse::class;

    private string $grantType;

    private string $clientId;

    private string $clientSecret;

    private string $scope;

    public function __construct(string $clientId, string $clientSecret)
    {
        $this->grantType = self::GRANT_TYPE;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->scope = implode(' ', self::SCOPES);
    }

    /**
     * @return array<string, string>
     */
    public function __toArray(): array
    {
        return [
            'grant_type' => $this->grantType,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'scope' => $this->scope,
        ];
    }

    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD;
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    /**
     * @return class-string<AuthResponse>
     */
    public function getResponseObjectClass(): string
    {
        return self::RESPONSE_CLASS;
    }
}