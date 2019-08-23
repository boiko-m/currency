<?php

    namespace app\config;

    use yii;
    use yii\base\BootstrapInterface;
    use yii\di\Container;
    use app\services\currency\CurrencyInterface;
    use app\services\currency\CurrencyStorage;
    use app\services\currency\Currency;

    /**
     * CurrencyBootstrap
     */
    class CurrencyBootstrap implements BootstrapInterface
    {

        public function bootstrap($app)
        {

            $container = \Yii::$container;

            $container->setSingleton('Currency');

            $container->set('app\services\currency\CurrencyInterface', function () {
                return new CurrencyStorage(Yii::$app->db);
            });

        }

    }