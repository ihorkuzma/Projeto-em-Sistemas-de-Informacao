<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;


use app\controllers\AlimentoController;
use app\controllers\ReservaController;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AlimentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alimentos';
$this->params['breadcrumbs'][] = $this->title;

?>

<br>

<center>  <?php echo Html::a('Fazer Encomenda', ['vendas/create', 'tipovenda' => 1,]  ) ?> </center>
<br>

        <center> <?php echo Html::a('Efectuar Reserva', ['reserva/create', 'tipovenda' => 2, ]) ?> <center>

<br>

        <center> <?php echo Html::a('Ver Reservas', ['reserva/view', 'id' => Yii::$app->user->identity->getId()]) ?> </center>
