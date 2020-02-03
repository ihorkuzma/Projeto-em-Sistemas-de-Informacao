<?php

namespace frontend\modules\api\controllers;

use frontend\models\Cliente;
use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `api` module
 */
class ClientesController extends ActiveController
{
    public $modelClass= 'frontend\models\Cliente';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionClientes(){

        $token = Yii::$app->request->get('token');
        //$params = Yii::$app->request->post();

        $rows = (new \yii\db\Query())
            ->select('user.id, Nome, Telemovel, Morada')
            ->from('user')
            ->join('LEFT JOIN', 'cliente', 'cliente.id = user.id')
            ->where(['auth_key' => $token])->all();
        if (isset($rows[0])){
            return $rows[0];
        }else{
            return "NAO ENCONTRADO";
        }
    }




    public function actionTotal()
    {
        $clientesmodel = new $this->modelClass;
        $totalClientes = $clientesmodel::find()->all();
        return ['Número de clientes registados' => count($totalClientes)];
    }

}
