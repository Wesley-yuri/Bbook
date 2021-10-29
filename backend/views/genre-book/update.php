<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GenreBook */

$this->title = Yii::t('app', 'Update Genre Book: {name}', [
    'name' => $model->genre_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Genre Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->genre_id, 'url' => ['view', 'genre_id' => $model->genre_id, 'book_id' => $model->book_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="genre-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
