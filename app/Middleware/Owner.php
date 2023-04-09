<?php
namespace App\Middleware;

class Owner{
    public function handle(){
        echo "hello from Owner middleware";
        
    }
}