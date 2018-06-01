<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?= Html::beginForm(['main/sms'], 'post');?>

<div class="col-lg-6">
    <div class="input-group">

<?= Html::beginForm(['main/sms'], 'post');

    echo Html::textInput('code',null,['class' => 'form-control']);

    echo '<span class="input-group-btn">';
    echo Html::submitButton('Дальше', ['class' => 'btn btn-secondary','type' => 'button']).'</span>';

//echo '<div class="form-group">'.Html::submitButton('Дальше', ['class' => 'btn btn-success']).'</div>';
?>
    </div>
</div

<?= Html::endForm()?>



