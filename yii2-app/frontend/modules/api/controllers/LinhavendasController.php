<?php

namespace frontend\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class LinhavendasController extends ActiveController
{
    public $modelClass= 'frontend\models\Linhavenda';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetlinhavendas(){

        $token = Yii::$app->request->get('token');
        //$params = Yii::$app->request->post();

        $rows = (new \yii\db\Query())
            ->select('linhavenda.id, linhavenda.quantidade, alimento.Nome_alimento')
            ->from('linhavenda')
            ->join('LEFT JOIN', 'vendas', 'linhavenda.id_venda = vendas.id')
            ->join('LEFT JOIN', 'user', 'user.id = vendas.Cliente_id')
            ->join('LEFT JOIN', 'alimento', 'linhavenda.id_alimento = alimento.id')
            ->where(['auth_key' => $token])->all();
        if (isset($rows)){
            return $rows;
        }else{
            return "NAO ENCONTRADO";
        }
    }


}
