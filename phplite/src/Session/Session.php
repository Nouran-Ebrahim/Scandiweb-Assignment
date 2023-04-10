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
    public static  function has($key)
    {
        return isset($_SESSION[$key]);
    }
    public static  function get($key)
    {
        return static::has($key)?$_SESSION[$key]:null;
    }
    public static  function remove($key)
    {
       unset($_SESSION[$key]);
    }
    public static  function flash($key)
    {
       $value=null;
       if(static::has($key)){
          $value=static::get($key);
          static::remove($key);
       }
       return $value;
    }
}
