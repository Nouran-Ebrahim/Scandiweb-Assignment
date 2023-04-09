<?php
namespace phplite\Url;

use phplite\Http\Request;
use phplite\Http\Server;

class Url
{
    private function __construct()
    {
    }
    /**
     * Get path
     *@param string $path
     * @return string $path
     */
    public static function path($path)
    {
        return Request::getBaseUrl().'/'.trim($path,'/');
    }
        /**
     * previous url
     * @return string 
     */
    public static function previous()
    {
        return Server::get('HTTP_REFERER');
    }
            /**
     * Redirect to page
     * @return string 
     */
    public static function redirect($path)
    {
        header('location: '.$path);
        exit();
    }
}