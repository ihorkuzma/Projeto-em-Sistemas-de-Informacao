<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tipoalimento */

$this->title = 'Create Tipoalimento';
$this->params['breadcrumbs'][] = ['label' => 'Tipoalimentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoalimento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
