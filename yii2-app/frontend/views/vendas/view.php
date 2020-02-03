<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Vendas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendas-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Cliente_id',
            'Tipo_venda_id',
            'id_mesa',
        ],
    ]) ?>

    <?= Html::a('Inserir ', ['alimento/index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
</div>
