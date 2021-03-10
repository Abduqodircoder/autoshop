<?php

use yii\bootstrap\Carousel;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\House */

$this->title = Yii::$app->name;
$this->params['breadcrumbs'][] = ['label' => 'Houses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="house-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php
        if (!Yii::$app->user->isGuest) {
            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);
        }
        ?>
    </p>

    <?= Carousel::widget([
        'items' =>
            $model->getImagesforcarousel(),
            'controls' => [
                '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
            ]
    ]);?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'img:ntext',
            [
                    'attribute' =>'Uy joylashgan manzil',
                    'value'=> $model->address_id,
            ],
            'rooms',
            'price',
//            'status',
            'description:ntext',
            [
               'label' => 'Qo`shilgan vaqti',
               'value' => function($model){
        return Yii::$app->formatter->asDate($model->create_at,'php:d.m.Y');
               }
            ],
        ],
    ]) ?>


</div>
