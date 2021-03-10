<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\HouseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uylar ro`yxati';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="house-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if(!Yii::$app->user->isGuest)
        echo Html::a('Uy qo`shish', ['create'], ['class' => 'btn btn-success']);
        ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' =>'_list',
    ]) ?>
    </div>


</div>
