<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GenreBook */

$this->title = $model->genre_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Genre Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="genre-book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'genre_id' => $model->genre_id, 'book_id' => $model->book_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'genre_id' => $model->genre_id, 'book_id' => $model->book_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'genre_id',
            'book_id',
        ],
    ]) ?>

        
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'genre_id',
            'book_id',

           
            ],

           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    );
 ?>
    







</div>
