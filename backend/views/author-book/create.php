<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AuthorBook */

$this->title = Yii::t('app', 'Create Author Book');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Author Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
