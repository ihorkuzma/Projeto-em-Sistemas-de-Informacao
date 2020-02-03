<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

use app\controllers\AlimentoController;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AlimentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pratos';
$this->params['breadcrumbs'][] = $this->title;

$idvenda=Yii::$app->request->get('idvenda');

?>
<div class="alimento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);


     ?>


    <form action="<?php Url::toRoute(['alimento/pedido'])?>" method="post">


    <table class="table">

        <thead>
        <tr>
            <th scope="col">Nome do prato</th>
            <th scope="col">Preço(€)</th>
            <th scope="col"></th>

        </tr>
        </thead>

        <tbody>

        <?php


        foreach ($alimentos as $alimento){
            ?>
            <tr>
                <td><?= $alimento->Nome_alimento?></td>
                <td><?= $alimento->Preco ?> </td>

                <td><?php echo Html::a('adicionar ao pedido', ['alimento/pedido', 'idvenda' => $idvenda , 'idalimento' => $alimento->id])?></td>


            </tr>
        <?php }; ?>
        </tbody>

    </table>


    </form>
</div>
