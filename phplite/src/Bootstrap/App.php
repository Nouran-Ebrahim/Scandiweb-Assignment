<?php
namespace phplite\Bootstrap;

use phplite\Http\Request;
use phplite\Http\Response;
use phplite\Http\Server;
use phplite\Session\Session;
use phplite\Router\Route;
use phplite\File\File;

// require '../routes/web.php';
// require '../routes/api.php';
class App
{
    private function __construct()
    {
    }
    /**
     * Run the application
     *
     * @return void
     */
    public static function run()
    {   //Require all routes directory
        File::require_directory('routes');

        //handel request

        Request::handle();
        //Route request
        $data = Route::handle();
        Response::output($data);

    }
}