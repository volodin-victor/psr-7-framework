<?php

function getLang(Request $request, $default) {
    return
        !empty($request->getQueryParams()['lang']) ? $request->getQueryParams()['lang'] :
            (!empty($request->getCookies()['lang']) ? $request->getCookies()['lang'] :
                (!empty($request->getSession()['lang']) ? $request->getSession()['lang'] :
                    (!empty($request->getServerParam()['HTTP_ACCEPT_LANGUAGE']) ?substr($request->getServerParam()['HTTP_ACCEPT_LANGUAGE'], 0, 2) :
                        $default)));
}
session_start();

class Request
{
    public function getQueryParams() : array
    {
        return $_GET;
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


$request = new Request();


$name = $_GET['name'] ?? 'Guest';
$lang = getLang($request,'en');

header('X-Developer: Victor Volodin');

echo 'Hello, ' . $name . '! Your language is ' . $lang;