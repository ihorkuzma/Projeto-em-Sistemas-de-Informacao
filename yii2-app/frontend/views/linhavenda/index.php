<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LinhavendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Linhavendas';
$this->params['breadcrumbs'][] = $this->title;

$idvenda=Yii::$app->request->get('id');

?>
<div class="linhavenda-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Adiciona os teus pratos', ['alimento/index','idvenda' =>$idvenda], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table">

        <thead>
        <tr>
            <th scope="col">Nome do prato</th>
            <th scope="col">Quantidade</th>

        </tr>
        </thead>

        <tbody>

        <?php


        foreach ($linhasVenda as $linhavenda){
            ?>
            <tr>
                <td><?= $linhavenda->alimento->Nome_alimento?></td>
                <td><?= $linhavenda->quantidade ?> </td>
            </tr>
        <?php }; ?>
        </tbody>

    </table>


    <?php


$models = $dataProvider->getModels();
$total = 0;

$totalComIva = 0;

 foreach ($models as $linhaVenda){
     $prato = $linhaVenda->alimento;

     $total += $linhaVenda->quantidade * $prato->Preco;
 }
 echo 'Total s/ IVA: ';
 echo  $total;
 echo '<br>';
 echo 'Total c/ IVA: ';

 echo ($total * 1.23);



    ?>

<br>


    <p>
        <?= Html::a('Terminar pedido', ['site/index'], ['class' => 'btn btn-success']) ?>
    </p>


</div>
