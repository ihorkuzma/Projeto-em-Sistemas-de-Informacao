<?php

namespace frontend\modules\api\controllers;

use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class TipovendasController extends ActiveController
{
    public $modelClass= 'frontend\models\Tipovenda';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
