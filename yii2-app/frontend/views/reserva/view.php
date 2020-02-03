<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reserva */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$id=Yii::$app->request->get('id');
?>
<div class="reserva-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <table class="table">

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


        foreach ($Reserva as $Reservas){
            ?>
            <tr>
                <td><?= $Reservas->id?></td>
                <td><?= $Reservas->Numero_pessoas ?> </td>
                <td><?= $Reservas->Cliente_id ?> </td>
                <td><?= $Reservas->Data_reserva ?> </td>
            </tr>
        <?php }; ?>
        </tbody>

    </table>

</div>
