<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tipovenda */

$this->title = 'Create Tipovenda';
$this->params['breadcrumbs'][] = ['label' => 'Tipovendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipovenda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
