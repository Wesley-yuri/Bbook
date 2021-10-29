<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GenreBook */

$this->title = Yii::t('app', 'Create Genre Book');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Genre Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genre-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
