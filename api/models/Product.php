<?php

namespace api\models;

class Product extends \common\models\Product 
{
    public function fields()
    {
        return [
            'id',
            'title',
            'description',
            'category_id',
            
        ];
    }
    public function extraFields()
    {
        return ['category'];
    }
}


?>