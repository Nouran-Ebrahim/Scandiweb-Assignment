<?php

namespace phplite\Http;

class Server
{
    private function __construct()
    {
    }
    /**
     * Get all server data
     *
     * @return array
     */
    public static function all() {
        return $_SERVER;
    }
    /**
     * Check that the server has the key
     *@param string $key
     * @return bool
     */
    public static function has($key) {
        return isset($_SERVER[$key]);
    }
    /**
     * Get the value of given key from server
     *@param string $key
     * @return string $value
     */
    public static function get($key) {
        return static::has($key)?$_SERVER[$key]:null;
    }

        /**
     * Get the path info of given path
     *@param string $path
     * @return array
     */
    public static function path_info($path) {
        return pathinfo($path);
    }
}
