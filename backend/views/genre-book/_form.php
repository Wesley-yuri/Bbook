<?php

use common\models\Book;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GenreBook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="genre-book-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'book_id')->textInput() ?>

    <?= $form->field($model, 'userGenre')->dropDownList(ArrayHelper::map(Book::find()->all(), 'id', ''), ['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
