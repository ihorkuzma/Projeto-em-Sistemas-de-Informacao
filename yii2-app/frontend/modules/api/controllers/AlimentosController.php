<?php

namespace frontend\modules\api\controllers;

use frontend\models\Linhavenda;
use frontend\models\Vendas;
use Yii;
use yii\debug\models\search\User;
use yii\web\Controller;
use yii\rest\ActiveController;


class AlimentosController extends ActiveController
{
    public $modelClass= 'frontend\models\Alimento';
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionTotalAlimentos()
    {
        $alimentosmodel = new $this->modelClass;
        $totalAlimentos = $alimentosmodel::find()->all();
        return ['Número de alimentos no restaurante' => count($totalAlimentos)];
    }
    public function actionPedido(){
        $token = Yii::$app->request->post('token');
        $id_venda = Yii::$app->request->post('id_venda');
        $id_alimento = Yii::$app->request->post('id_alimento');
        $linhavenda = LinhaVenda::findOne(['id_alimento'=>$id_alimento, 'id_venda'=>$id_venda]);

        //ver se prato ja está na venda
        if($linhavenda!=NULL){
            $linhavenda->quantidade = $linhavenda->quantidade + 1;
            $linhavenda->save();

        }else{
            $venda = new Vendas();
            $venda->id_mesa=0;
            $venda->Tipo_venda_id=1;
            $user = (new \yii\db\Query())
                ->select('id')
                ->from('user')
                ->where(['auth_key' => $token])->all()[0];

            $venda->Cliente_id = intval ($user["id"], 10);


            $venda->save();

            $linhavenda= new LinhaVenda();
            $linhavenda->id_alimento = $id_alimento;
            $linhavenda->id_venda= $venda->id;
            $linhavenda->quantidade=1;
            $linhavenda->save();
        }
        $linhavenda->save();

        return "PEDIDO FEITO!";
    }





   /* public function behaviors()
    {
        $behaviors= parent::behaviors();
        $behaviors['authenticador']= [
            'class' => HttpBasicAuth::className(),
            'auth' =>[$this, 'auth']
        ];
        return $behaviors;
    }

    public function auth($username, $password){
        $user= \frontend\models\User::findByUsername($username);
        if($user && $user->validatePassword($password)){
            return $user;
        }
    }*/
}
