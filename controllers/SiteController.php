<?php

    namespace app\controllers;

    use yii\filters\auth\HttpBearerAuth;

    use app\services\currency\Currency;
    use app\models\CurrencyForm;
    use Yii;
    use yii\data\ArrayDataProvider;
    use yii\filters\VerbFilter;
    use yii\web\Controller;

    class SiteController extends Controller
    {
        private $service;

        public function __construct($id, $module, Currency $service, $config = [])
        {
            $this->service = $service;
            parent::__construct($id, $module, $config);
        }

        public function actionIndex()
        {
            return $this->render('index');
        }

        public function actionCreate()
        {
            $form = new CurrencyForm();
            if ($form->load(Yii::$app->request->post()) && $form->validate()) {
                $this->service->createCur($form->name, $form->rate);
                return $this->redirect(['index']);
            }

            return $this->render('create', [
                'model' => $form,
            ]);
        }

        public function actionDelete($id)
        {
            $this->service->remove($id);
            return $this->redirect(['index']);
        }

    }