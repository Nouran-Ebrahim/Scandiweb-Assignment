<?php
namespace App\Controllers;

use phplite\Http\Response;
use phplite\Url\Url;
use phplite\View\View;
use phplite\Http\Request;
use phplite\Database\Database;

class ProductController
{
    public function index()
    {
        $products= Database::table('products')->get();
        return View::render('productlist',["products"=>$products]);
    }

    public function create()
    {
        return View::render('addproduct');
    }
    public function store()
    {
         Database::table('products')->insert([
            'sku' => str_replace(" ", "-", Request::post('sku')),
            'name' => Request::post('name'),
            'price' => Request::post('price'),
        ]);
        return Url::redirect(Url::path('/product-list'));
    }
    public function delete(){
        $seletedid=Request::post('deleted');
        Database::table("products")->where('id','=',$seletedid)->delete();
    }
}