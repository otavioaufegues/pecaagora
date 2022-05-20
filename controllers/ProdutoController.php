<?php

namespace app\controllers;

use app\models\Produto;


class ProdutoController extends \yii\web\Controller
{


    public function actionIndex()
    {
        $model = new Produto();
        $msg = '';
        if ($this->request->isPost) {
            $response = $model->buscarApiML($this->request->post()["Produto"]['id']);
            if (!isset($response->error)) {
                $model->id = $response->id;
                $model->title = $response->title;
                $model->category_id = $response->category_id;
                $model->price = $response->price;
                $model->available_quantity = $response->available_quantity;
                $model->thumbnail = $response->thumbnail;
                $model->permalink = $response->permalink;
            } else {
                $msg = "Não encontrado";
            }
        }

        return $this->render('index', ['model' => $model, 'mensagem' => $msg]);
    }
}
