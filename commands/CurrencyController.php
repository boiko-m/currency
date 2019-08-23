<?php

namespace app\commands;

use app\services\currency\Currency;
use yii\console\Controller;
use yii\console\ExitCode;

class CurrencyController extends Controller
{

    private $service;

    public function __construct($id, $module, Currency $service, $config = [])
    {
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }

    /**
     * @return int Exit code
     */
    public function actionUpd()
    {

        $this->service->itemsUpdate();

        return ExitCode::OK;
    }
}
