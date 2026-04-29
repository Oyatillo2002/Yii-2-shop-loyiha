<?php

namespace api\modules\v2\controllers;

use api\controllers\MyController;
use api\modules\v2\models\Product;
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