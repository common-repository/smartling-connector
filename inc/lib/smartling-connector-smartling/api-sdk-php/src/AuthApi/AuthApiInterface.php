<?php

namespace Smartling\Vendor\Smartling\AuthApi;
use Smartling\Vendor\Smartling\Exceptions\InvalidAccessTokenException;

/**
 * Interface AuthApiInterface
 *
 * @package Smartling\Vendor\Smartling\Auth
 */
interface AuthApiInterface
{

    /**
     * @return string token
     * @throws InvalidAccessTokenException
     */
    public function getAccessToken();

    /**
     * @return string
     */
    public function getTokenType();

    /**
     * @return void
     */
    public function resetToken();
}
