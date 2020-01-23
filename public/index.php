<?php

function getLang(array $request, $default) {
    return
        !empty($request['get']['lang']) ? $request['get']['lang'] :
            (!empty($request['cookie']['lang']) ? $request['cookie']['lang'] :
                (!empty($request['session']['lang']) ? $request['session']['lang'] :
                    (!empty($request['server']['HTTP_ACCEPT_LANGUAGE']) ?substr($request['server']['HTTP_ACCEPT_LANGUAGE'], 0, 2) :
                        $default)));
}
session_start();
$request = [
    'get' => $_GET,
    'cookie' => $_COOKIE,
    'session' => $_SESSION,
    'server' => $_SERVER,
];


$name = $_GET['name'] ?? 'Guest';
$lang = getLang($request,'en');

header('X-Developer: Victor Volodin');

echo 'Hello, ' . $name . '! Your language is ' . $lang;