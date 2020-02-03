<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Cliente_id')->textInput() ?>

    <?= $form->field($model, 'Tipo_venda_id')->textInput() ?>

    <?= $form->field($model, 'id_mesa')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
