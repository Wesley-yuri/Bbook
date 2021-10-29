<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AuthorBook */

$this->title = Yii::t('app', 'Update Author Book: {name}', [
    'name' => $model->author_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Author Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->author_id, 'url' => ['view', 'author_id' => $model->author_id, 'book_id' => $model->book_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="author-book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
