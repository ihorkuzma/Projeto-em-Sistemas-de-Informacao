<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Linhavenda */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Linhavendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="linhavenda-view">


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


        foreach ($LinhaVenda as $linhavenda){
            ?>
            <tr>
                <td><?= $linhavenda->id?></td>
                <td><?= $linhavenda->id_alimento ?> </td>
                <td><?= $linhavenda->quantidade ?> </td>
                <td><?= $linhavenda->id_venda ?> </td>
            </tr>
        <?php }; ?>
        </tbody>
    </table>

</div>
