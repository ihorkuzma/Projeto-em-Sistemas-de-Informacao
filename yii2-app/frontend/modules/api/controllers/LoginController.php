<?php

namespace frontend\modules\api\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

/**
 * Default controller for the `api` module
 */
class LoginController extends ActiveController
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


    public function actionLogin()
    {
        $model = new LoginForm();
        $params = Yii::$app->request->post();
        $model->username = $params['username'];
        $model->password = $params['password'];
        if ($model->login()) {
            $response['message'] = 'You are now logged in!';
            $response['user'] = \common\models\User::findByUsername($model->username);
            //return [$response,$model];
            return $response;
        }
        else {
            $model->validate();
            $response['errors'] = $model->getErrors();
            return $response;
        }
    }



    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
