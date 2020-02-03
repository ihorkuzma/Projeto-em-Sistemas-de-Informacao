<?php

namespace frontend\modules\api\controllers;

use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class MesasController extends ActiveController
{
    public $modelClass= 'frontend\models\Mesa';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
