<?php

    namespace app\controllers;

    use yii\filters\auth\HttpBearerAuth;
    use yii\rest\Controller;


    class CurrencyController extends Controller
    {

        private $service;

        public function __construct($id, $module, \app\services\currency\Currency $service, $config = [])
        {
            $this->service = $service;
            parent::__construct($id, $module, $config);
        }

        public function actionIndex()
        {
            return $this->service->getItems();
        }

        public function actionView($id)
        {
            return $this->service->getItem($id);
        }

        /**
         * @inheritdoc
         */
        protected function verbs()
        {
            return [
                'index' => ['GET'],
            ];
        }

        public function behaviors() {

            $behaviors = parent::behaviors();

            $behaviors['authenticator'] = [
                'class' => HttpBearerAuth::className(),
            ];

            return $behaviors;
        }

    }