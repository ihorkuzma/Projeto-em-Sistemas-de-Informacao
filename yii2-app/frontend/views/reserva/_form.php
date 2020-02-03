<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reserva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Numero_pessoas')->textInput() ?>

    <?=$form->field($model, 'Cliente_id')->textInput(['readonly'=> true, 'value' => Yii::$app->user->identity->getId()]) ?>

    <?= $form->field($model, 'Data_reserva')->widget(DateTimePicker::className(),[
        'type' =>DateTimePicker::TYPE_INPUT,
        'pluginOptions' => [
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => 'yyyy-m-d hh:ii',
            // 'daysOfWeekDisabled' => [0, 6],
            'hoursDisabled' => '0,1,2,3,4,5,6,7,8,9,10,11,15,16,17,18,19,22,23,24',
            'startDate' => date('Y-m-d H:i:s'),

            'autoclose' => true,
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>


