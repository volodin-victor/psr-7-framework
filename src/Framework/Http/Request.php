<?php


namespace Framework\Http;


class Request
{
    public function getQueryParams() : array
    {
        return $_GET;
    }

    public function getParsedBody()
    {
        return $_POST ?: null;
    }

    public function getCookies() : array
    {
        return $_COOKIE;
    }

    public function getSession() :array
    {
        return $_SESSION;
    }

    public function getServerParam()
    {
        return $_SERVER;
    }
}