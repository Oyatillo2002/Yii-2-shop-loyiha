<?php

namespace api\models;

class User extends \common\models\User
{
    public function fields()
    {
        return [
            'id',
            'username',
            'email',
            // bu anonim funksiya bu orqali jadvaldagi bir nechta ustunni birlashtirib 
            // bitta qatorda chiqarish mumkin 
            'name' => function ($model) { 
            return $model->username . ' ' . $model->email;
        },
        ];
    }
}
?>