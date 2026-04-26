<?php

namespace frontend\models;

use yii\base\Model;

class MyLogin extends Model
{
    public $first_name;
    public $age;
    public $email;
    public $country;
    const SONLAR = [2, 4, 25];
    public function rules()
    {
        return [
            [['email', 'first_name', 'age', 'country'], 'required', 'message' => "Iltimos maydonlarni to'ldiring!"],
            ['first_name', 'string'],
            ['age', 'integer', 'max'=>30, 'min'=>15, "tooBig"=>'juda katta', "tooSmall"=>'juda kichik'],
           

            ['age', 'validateMalumot']

        ];
    }
    public function validateMalumot($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, self::SONLAR)){
            $this->addError($attribute, "boshaqa qiymat kiriting");
        }
    }
    public function attributeLabels()
    {
        return [
            'age' => 'Yoshingiz',
            'first_name' => 'Ismingiz',
            'email' => 'Emailngiz',
        ];
    }

}

?>