<?php

namespace api\modules\v1\controllers;

use api\controllers\MyController;
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