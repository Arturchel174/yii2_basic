<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Visit */

$this->title = 'Студент';
$this->params['breadcrumbs'][] = ['label' => 'Посещаемость', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'students_id',
                'value' => ArrayHelper::getValue($model, ['students.name']),
            ],
            [
                'attribute' => 'teacher_id',
                'value' => ArrayHelper::getValue($model, 'teacher.teacher_sur_name'),
            ],
            [
                'attribute' => 'subject_id',
                'value' => ArrayHelper::getValue($model, 'subject.subject'),
            ],
            [
                'attribute' => 'plus_id',
                'value' => ArrayHelper::getValue($model, 'plus.operation'),
            ],
            'date',
        ],
    ]) ?>

</div>
