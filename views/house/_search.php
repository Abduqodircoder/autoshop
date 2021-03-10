<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\HouseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="house-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'address_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\District::find()->all(),'id','name'),
        ['prompt'=>'tanlang']) ?>


    <div class="form-group">
        <?= Html::submitButton('Qidirish', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
