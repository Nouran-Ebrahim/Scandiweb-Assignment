<?php

namespace phplite\Session;

class Session
{
    private function __construct()
    {
    }
    /**
     * Session start
     *
     * @return void
     */
    public static  function start()
    {
        if (!session_id()) {
            ini_set("session.use_only_cookies", 1);
            session_start();
        }
    }

    /**
     * Set New Session
     *@param string $key
     *@param string $value
     * @return string $value
     */
    public static  function set($key, $value)
    {
        $_SESSION[$key] = $value;
        return $value;
    }
}
