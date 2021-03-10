<?php
/**
 * @var $model app\models\House*/

use yii\helpers\Url as UrlAlias;

?>

  <div class="col-sm-4 col-md-4">
    <div class="thumbnail">
      <img src="<?= !empty($model->getImages())?UrlAlias::to([$model->getImages()[0]]) : " "?>" alt="...">
      <p class="caption">
        <h3>Manzil: <?=$model->address->name?></h3>
        <h3>Xonalar soni :<?=$model->rooms?></h3>
        <h3>Uy narxi: <?=$model->price?>  so'm</h3>
          <p class="text-right"> <?= Yii::$app->formatter->asRelativeTime($model->create_at)?></p>

        <p><a href="<?= UrlAlias::to(['house/view','id'=>$model->id])?>" class="btn btn-primary" role="button">Ko'proq</a></p>
      </div>
    </div>
