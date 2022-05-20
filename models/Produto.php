<?php

namespace app\models;

use Yii;
use yii\base\Model;
use linslin\yii2\curl;

class Produto extends Model
{
    public $id;
    public $title;
    public $category_id;
    public $price;
    public $available_quantity;
    public $thumbnail;
    public $permalink;

    public function rules()
    {
        return [
            [[
                "id",
                "title",
                "category_id",
                "price",
                "available_quantity",
                "thumbnail",
                "permalink"
            ], 'string'],
        ];
    }

    public function buscarApiML($id)
    {

        $id = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%)(]/s', '', $id);
        // //Init curl
        $curl = new curl\curl();

        // //get http://example.com/
        $response = $curl->get('https://api.mercadolibre.com/items/' . $id);
        $jsonDecode = json_decode($response);

        // echo "<pre>";
        // var_dump($jsonDecode);
        // die;
        return $jsonDecode;
    }
}
