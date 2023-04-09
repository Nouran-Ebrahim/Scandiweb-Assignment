<?php
namespace phplite\Http;

class Response
{

    private function __construct()
    {
    }
    /**
     * Return json Response 
     *@param mixed $data
     * @return mixed
     */
    public static function json($data)
    {
        return json_encode($data);
    }
    /**
     * Ourput data
     *
     * @param mixed $data
     */
    public static function output($data)
    {
        if (!$data) {
            return;
        }
        if (!is_string($data)) {
            $data = static::json($data);
        }
        echo $data;
    }

}