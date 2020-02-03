<?php


namespace frontend\modules\api\controllers;
use yii\rest\ActiveController;
use yii\web\Controller;

class EncomendasController extends ActiveController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTotalEncomendas()
    {
        $rows = (new \yii\db\Query())
            ->select(['id', 'Nome_alimento', 'Preco', 'Tipo_Alimento_id', 'quantidade'])
            ->from('alimento')
            ->join('LEFT JOIN','linhavenda', 'linhavenda.id_alimento = id')
            ->all();

        return ['Encomenda Android' => $rows];
    }


}


/*Id - do aliemtno
Id_venda - da linha venda
nomeAlimento - do aliemtno
quantidadeAlimento - da linha venda
tipoAlimento - do aliemtno
precoAlimento - do alimento*/