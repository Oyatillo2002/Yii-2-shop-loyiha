<?php

namespace api\modules\v2\models;

class Product extends \api\models\Product
{
     public function fields()
    {
        return [
            'id',
            'title',
            'category',
            
        ];
    }
}

?>