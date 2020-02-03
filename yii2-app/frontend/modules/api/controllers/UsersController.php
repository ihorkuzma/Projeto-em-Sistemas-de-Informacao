<?php

namespace frontend\modules\api\controllers;

use yii\rest\ActiveController;
use yii\web\Controller;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;


/**
 * Default controller for the `api` module
 */
class UsersController extends ActiveController
{
    public $modelClass= 'frontend\models\User';
    /**
     * Renders the index view for the module
     * @return string
     */


    public function actionIndex()
    {
        return $this->render('index');
    }
}
