<?php
namespace phplite\Router;

use phplite\Http\Request;
use phplite\View\View;

class Route
{
    /**
     * Route container
     *
     * @var array $routes
     */
    private static $routes = [];
    /**
     * Middleware
     *
     * @var string $middleware
     */
    private static $middleware;
    /**
     * Prefix
     *
     * @var string $prefix
     */
    private static $prefix;
    /**
     * Route construct
     *
     * @return void
     */
    private function __construct()
    {
    }
    /**
     * Add routes
     *@param string $methods
     *@param string $uri
     *@param object|callback $callback
     */
    private static function add($methods, $uri, $callback)
    {
        $uri = rtrim(static::$prefix . '/' . trim($uri, '/'), '/');
        $uri = $uri ?: '/';
        foreach (explode('|', $methods) as $method) {
            static::$routes[] = [
                'uri'       => $uri,
                'callback'  => $callback,
                'method'    => $method,
                'middleware' => static::$middleware
            ];
        }
    }
    /**
     * Add new get route
     *@param string $uri
     *@param object|callback $callback
     */
    public static function get($uri, $callback)
    {
        static::add('GET', $uri, $callback);
    }
    /**
     * Add new post route
     *@param string $uri
     *@param object|callback $callback
     */
    public static function post($uri, $callback)
    {
        static::add('POST', $uri, $callback);
    }
    /**
     * Add new any route
     *@param string $uri
     *@param object|callback $callback
     */
    public static function any($uri, $callback)
    {
        static::add('GET|POST', $uri, $callback);
    }
    /**
     * Add new put route
     *@param string $uri
     *@param object|callback $callback
     */
    public static function put($uri, $callback)
    {
        static::add('PUT', $uri, $callback);
    }
    /**
     * Add new delete route
     *@param string $uri
     *@param object|callback $callback
     */
    public static function delete($uri, $callback)
    {
        static::add('DELETE', $uri, $callback);
    }
    public static function allRoutes()
    {
        return static::$routes;
    }
    /**
     * Set prefix for routing
     *@param string $prefix
     *@param callback $callback
     */
    public static function prefix($prefix, $callback)
    {
        $parent_prefix = static::$prefix;
        static::$prefix .= '/' . trim($prefix, '/');
        if (is_callable($callback)) {
            call_user_func($callback);
        } else {
            throw new \Exception("please provide valid callback function");
        }
        static::$prefix = $parent_prefix;
    }
    /**
     * Set middleware for routing
     *@param string $middleware
     *@param callback $callback
     */
    public static function middleware($middleware, $callback)
    {
        $parent_middleware = static::$middleware;
        static::$middleware .= '|' . trim($middleware, '|');
        if (is_callable($callback)) {
            call_user_func($callback);
        } else {
            throw new \Exception("please provide valid callback function");
        }
        static::$middleware = $parent_middleware;
    }
    /**
     *Handle the request and match the routes
     *@return mixed
     */
    public static function handle()
    {
        $uri = Request::getUrl();
        foreach (static::$routes as $route) {
            $matched = true;
            $route['uri'] = preg_replace('/\/{(.*?)}/', '/(.*?)', $route['uri']);
            $route['uri'] = '#^' . $route['uri'] . '$#';
            if (preg_match($route['uri'], $uri, $matches)) {
                array_shift($matches);
                $params = array_values($matches);
                foreach ($params as $param) {
                    if (strpos($param, '/')) {
                        $matched = false;
                    }
                }
                if ($route['method'] != Request::method()) {
                    $matched = false;
                }
                if ($matched == true) {
                    return static::invoke($route, $params);
                }

            }
        }
        return View::render('e404');
    }
    /**
     * invoke the route
     *@param array $route
     *@param array $params
     */
    public static function invoke($route, $params = [])
    {
        static::executeMiddleware($route);
        $callback = $route['callback'];
        if (is_callable($callback)) {
            return call_user_func_array($callback, $params);
        } elseif (strpos($callback, '@') != false) {
            list($controller, $method) = explode('@', $callback);
            $controller = 'App\Controllers\\' . $controller;
            if (class_exists($controller)) {
                $object = new $controller;
                if (method_exists($object, $method)) {
                    return call_user_func_array([$object, $method], $params);
                } else {
                    throw new \BadFunctionCallException("The method " . $method . " isn't exists at " . $controller);
                }
            } else {
                throw new \ReflectionException("class " . $controller . " isn't found");
            }
        } else {
            throw new \InvalidArgumentException("Please provide a valid callback function");
        }
    }
    /**
     * Execute Middleware
     *@param array $route
     */
    public static function executeMiddleware($route)
    {
        foreach (explode('|', $route['middleware']) as $middleware) {
            if ($middleware != '') {
                $middleware = 'App\Middleware\\' . $middleware;
                if (class_exists($middleware)) {
                    $object = new $middleware;
                    return call_user_func_array([$object, 'handle'], []);
                } else {
                    throw new \ReflectionException("Middleware " . $middleware . " isn't found");
                }
            }
        }
    }
}