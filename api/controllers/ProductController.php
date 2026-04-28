<?php

namespace api\controllers;

use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()
        ]);

        return $dataProvider;
    }
}
?>