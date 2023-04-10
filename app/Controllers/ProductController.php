<?php
namespace App\Controllers;

use phplite\Http\Response;
use phplite\Session\Session;
use phplite\Url\Url;
use phplite\View\View;
use phplite\Http\Request;
use phplite\Database\Database;

class ProductController
{
    public function index()
    {
        $products = Database::table('products')->get();
        return View::render('productlist', ["products" => $products]);
    }

    public function create()
    {
        return View::render('addproduct');
    }
    public function store()
    {
        $sku = Database::table('products')->where('sku', '=', Request::post('sku'))->first();
        if ($sku) {
             Session::set('msg',"SKU already exist");
             return Url::redirect(Url::previous());
        } else {
            Database::table('products')->insert([
                'sku' => str_replace(" ", "-", Request::post('sku')),
                'name' => Request::post('name'),
                'price' => Request::post('price'),
                'size' => Request::post('size'),
                'weight' => Request::post('weight'),
                'height' => Request::post('height'),
                'width' => Request::post('width'),
                'length' => Request::post('length'),
            ]);
            return Url::redirect(Url::path('/product-list'));
        }

    }
    public function delete()
    {
        $seletedids = Request::post('deleted');
        $data=implode(" ",$seletedids);
        $dataarray=explode(" ",$data);
        foreach ($dataarray as $seletedid) {
            Database::table("products")->where('id', '=', $seletedid)->delete();
        }

        return Url::redirect(Url::path('/product-list'));
    }
}