<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\web\UrlManager;
use yii\helpers\Url;
?>

<?php

  foreach ($group as $key => $value)
  {
      $url = Url::toRoute(['test/gg', 'id' => $key]);
      echo '<a href="'.$url.'">'.$value.'</a><br>';

  }


?>


