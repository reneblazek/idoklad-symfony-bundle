<?php

namespace Mufin\IDokladBundle\Model\Auth;

use JMS\Serializer\Annotation as Serializer;
use Mufin\IDokladBundle\Helper\BundleResponseInterface;

class AuthResponse implements BundleResponseInterface
{
    /**
     * @Serializer\SerializedName("access_token")
     * @Serializer\Type("string")
     */
    private string $accessToken;

    /**
     * @Serializer\SerializedName("expires_in")
     * @Serializer\Type("int")
     */
    private int $expiresIn;

    /**
     * @Serializer\SerializedName("token_type")
     * @Serializer\Type("string")
     */
    private string $tokenType;

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    public function setExpiresIn(int $expiresIn): self
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }

    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    public function setTokenType(string $tokenType): self
    {
        $this->tokenType = $tokenType;
        return $this;
    }
}