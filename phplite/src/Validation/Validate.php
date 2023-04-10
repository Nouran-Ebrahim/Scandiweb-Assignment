<?php
namespace phplite\Validation;

use Rakit\Validation\Validator;

class Validate
{
    private function __construct()
    {
    }
    public static function validate(array $rules, $json)
    {
        $validator = new Validator;

        $validation = $validator->validate($_POST + $_FILES,$rules);
        $errors = $validation->errors();
        if ($validation->fails()) {
            if($json){
                return ['errors'=>$errors->firstOfAll()];
            }
        }
    }
}