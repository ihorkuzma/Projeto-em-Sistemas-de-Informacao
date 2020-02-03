<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cliente */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

    <br>




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Nome',
            'Telemovel',
            'Morada',
        ],
    ]) ?>

    <p>
        <br>
        <?= Html::a('Actualiza os teus dados ', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

</div>
