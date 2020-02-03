<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Reserva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Numero_pessoas')->textInput() ?>

    <?= $form->field($model, 'Cliente_id')->textInput() ?>

    <?= $form->field($model, 'Data_reserva')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
