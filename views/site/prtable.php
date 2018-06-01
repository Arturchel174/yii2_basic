<?php
use yii\helpers\Url;
use yii\models\Teacher;
foreach ($teach as $key => $value)
  {
    $url = Url::toRoute(['site/pr', 'id' => $key]);
  echo '<a href="'.$url.'">'.$value.'</a><br>';
  }

?>
