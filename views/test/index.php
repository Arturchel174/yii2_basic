<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
?>
<h4>Пользователи</h4>
<p><? foreach ($a as $aa) {
	echo $aa->name.' '.$aa->age. '<br>';

};
?></p>




