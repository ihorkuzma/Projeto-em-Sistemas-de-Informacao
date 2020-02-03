<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Linhavenda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linhavenda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_alimento')->textInput() ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'id_venda')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
