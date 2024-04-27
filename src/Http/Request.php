<?php

namespace System\Http;

use stdClass;

class Request
{
    public static array $request = [];
    public static array $server = [];
    public static array $cookies = [];
    public static array $files = [];

    public static function capture(array $params = [])
    {
        self::$files = $_FILES;
        self::$cookies = $_COOKIE;
        self::$server = $_SERVER;

        $request = [];
        $_GET["id"] = 1;
        $request["GET"] = array_merge($_GET, $params);
        $request["POST"] = $_POST;

        $request["DATA-FORM"] = [];
        $request["DATA-JSON"] = [];

        if (string_starts_with(isset($request["SERVER"]["CONTENT_TYPE"]) ? $request["SERVER"]["CONTENT_TYPE"] : "", "application/x-www-form-urlencoded")) {
            parse_str(urldecode(file_get_contents("php://input")), $input);
            $request["DATA-FORM"] = $input;
        }
        if (string_starts_with(isset($request["SERVER"]["CONTENT_TYPE"]) ? $request["SERVER"]["CONTENT_TYPE"] : "", "application/json")) {
            $request["DATA-JSON"] = (array) json_decode(file_get_contents("php://input"), true);
        }
        self::$request = array_merge($request["GET"], $request["POST"], $request["DATA-FORM"], $request["DATA-JSON"]);
        return new static();
    }

    public static function all(): array
    {
        return self::$request;
    }
    public static function server(): array
    {
        return self::$server;
    }
    public static function cookies(): array
    {
        return self::$cookies;
    }

    public static function hasFile(string $key = "")
    {
        return isset(self::$files[$key]);
    }
    public static function file(string $key = "")
    {
        return  self::$files[$key] ?? null;
    }
    protected static function getHeaders(string $key = ""): string
    {
        if (isset(self::$server[$key])) return self::$server[$key];
        return "";
    }

    public static function getVar(string $key)
    {
        $data = self::$request;
        return $data[$key] ?? null;
    }

    protected static function getCookie(string $key = ""): string
    {
        if (isset(self::$cookies[$key])) return self::$cookies[$key];
        return "";
    }
}
