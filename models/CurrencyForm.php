<?php

    namespace app\models;
    use yii\base\Model;

    class CurrencyForm extends Model
    {
        public $name;
        public $rate;
        public function rules()
        {
            return [
                [['name', 'rate'], 'required'],
                [['name', 'rate'], 'string'],
            ];
        }
    }