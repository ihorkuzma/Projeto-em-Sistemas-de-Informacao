<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LinhavendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Linhavendas';
$this->params['breadcrumbs'][] = $this->title;

$id=Yii::$app->request->get('id');

?>
<div class="linhavenda-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Linhavenda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table">

        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">id_alimento</th>
            <th scope="col">quantidade</th>
            <th scope="col">id_venda</th>

        </tr>
        </thead>

        <tbody>

        <?php


        foreach ($linhaVenda as $linhavenda){
            ?>
            <tr>
                <td><?= $linhavenda->id?></td>
                <td><?= $linhavenda->id_alimento ?> </td>
                <td><?= $linhavenda->quantidade ?> </td>
                <td><?= $linhavenda->id_venda ?> </td>
            </tr>
        <?php }; ?>
        </tbody>



        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Numero_pessoas</th>
            <th scope="col">Cliente_id</th>
            <th scope="col">Data_reserva</th>

        </tr>
        </thead>

        <tbody>

        <?php


        foreach ($Reserva as $reserva){
            ?>
            <tr>
                <td><?= $reserva->id?></td>
                <td><?= $reserva->Numero_pessoas ?> </td>
                <td><?= $reserva->Cliente_id ?> </td>
                <td><?= $reserva->Data_reserva ?> </td>
            </tr>
        <?php };
        ?>
        </tbody>

    </table>


</div>
