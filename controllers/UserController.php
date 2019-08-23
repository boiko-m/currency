<?php

    namespace app\controllers;

    use yii\rest\ActiveController;
    use yii\rest\Controller;
    use app\models\User;

    class UserController extends Controller
    {
        public $modelClass = 'app\models\User';

        public function actionIndex()
        {
            return User::getAll();
        }

        /**
         * @inheritdoc
         */
        protected function verbs()
        {
            return [
                'index' => ['GET', 'HEAD'],
            ];
        }

    }