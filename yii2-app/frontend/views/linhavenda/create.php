<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Linhavenda */

$this->title = 'Create Linhavenda';
$this->params['breadcrumbs'][] = ['label' => 'Linhavendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linhavenda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
