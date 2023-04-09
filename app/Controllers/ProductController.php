<?php
namespace App\Controllers;

use phplite\Http\Response;
use phplite\Url\Url;
use phplite\View\View;
use phplite\Database\Database;

class ProductController
{
    public function index()
    {
    
        // return Database::table('users')->where('id','=',2)->delete();
        // return Database::instance();
        // return Database::table('users')->first();
        // return View::render('admin.dashboard',['name'=>'nouran']);
        return View::render('productlist');
    }

}