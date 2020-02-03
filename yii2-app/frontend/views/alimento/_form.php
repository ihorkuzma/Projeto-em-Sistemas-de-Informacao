<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Alimento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alimento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome_alimento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Preco')->textInput() ?>

    <?= $form->field($model, 'Stock')->textInput() ?>

    <?= $form->field($model, 'Tipo_Alimento_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
