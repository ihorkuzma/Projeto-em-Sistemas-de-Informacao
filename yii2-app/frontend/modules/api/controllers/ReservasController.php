<?php

namespace frontend\modules\api\controllers;
use frontend\models\Reserva;
use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
/**
 * Default controller for the `api` module
 */
class ReservasController extends ActiveController
{
    public $modelClass= 'frontend\models\Reserva';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetreservas(){

        $token = Yii::$app->request->get('token');
        //$params = Yii::$app->request->post();

        $rows = (new \yii\db\Query())
            ->select('reserva.id, Numero_pessoas, Cliente_id, Data_reserva')
            ->from('user')
            ->join('LEFT JOIN', 'reserva', 'reserva.Cliente_id = user.id')
            ->where(['auth_key' => $token])->all();
        if (isset($rows)){
            return $rows;
        }else{
            return "NAO ENCONTRADO";
        }
    }

    public function actionReservas()
    {
        $model = new Reserva();

        $token = Yii::$app->request->post('token');
        $num_pessoas = Yii::$app->request->post('Numero_pessoas');
        $data = Yii::$app->request->post('Data_reserva');

        $rows = (new \yii\db\Query())
            ->select('user.id')
            ->from('user')
            ->where(['auth_key' => $token])->all();

        $id = intval ($rows[0]["id"], 10);

        $model->Cliente_id=$id;
        $model->Data_reserva=$data;
        $model->Numero_pessoas=$num_pessoas;
        $model->save();
        return $model;
    }

    public function actionTotal()
    {
        $reservasmodel = new $this->modelClass;
        $totalReservas = $reservasmodel::find()->all();
        return ['Número de reservas' => count($totalReservas)];
    }


}
