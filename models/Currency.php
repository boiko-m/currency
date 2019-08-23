<?php

    namespace app\models;

    use Yii;

    /**
     * This is the model class for table "currency".
     *
     * @property int $id
     * @property string $name
     * @property string $rate
     */
    class Currency extends \yii\db\ActiveRecord
    {
        /**
         * {@inheritdoc}
         */
        public static function tableName()
        {
            return 'currency';
        }

        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return [
                [['name', 'rate'], 'required'],
                [['name', 'rate'], 'string', 'max' => 255],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'name' => 'Name',
                'rate' => 'Rate',
            ];
        }

        public static function getAll()
        {

            foreach (self::find()->all() as $cur) {
                $result[] = [
                    'name' => $cur['name'],
                    'rate' => $cur['rate'],
                ];
            }

            return $result;
        }

        public static function getOne($id)
        {

            $cur = self::findOne($id);
            $result = [
                'name' => $cur['name'],
                'rate' => $cur['rate'],
            ];


            return $result;
        }
    }
