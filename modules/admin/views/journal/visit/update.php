<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Visit */

$this->title = 'Изменить: ' . $model->students_id;
$this->params['breadcrumbs'][] = ['label' => 'Посещаемость', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->students_id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="visit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
