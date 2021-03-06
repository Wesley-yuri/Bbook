<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OrderBook */

$this->title = 'Update Order Book: ' . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Order Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['view', 'order_id' => $model->order_id, 'book_id' => $model->book_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
