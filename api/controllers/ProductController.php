<?php

namespace api\controllers;

use api\models\Product;
use yii\data\ActiveDataProvider;

class ProductController extends MyController
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