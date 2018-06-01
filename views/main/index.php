<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Students;
use app\models\Teacher;
use app\models\Subject;
use app\models\Group;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\form\FirstForm */
/* @var $form ActiveForm */
?>
<div class="index">




    <?php if(Yii::$app->session->hasFlash('success')){
        Yii::$app->session->getFlash('success');
    }?>
    <?php $form = ActiveForm::begin(['id' => 'FirstForm',
    'action' =>['main/getbridge']]); ?>

    <?= $form->field($model, 'teacher')->label('Преподаватель')->dropDownList(Teacher::find()->select(["CONCAT(teacher_sur_name, ' ',teacher_name, ' ',teacher_patronymic_name)", 'id'])->indexBy('id')->column(), ['prompt' => '']) ?>
    <?= $form->field($model, 'group')->label('Группа')->dropDownList(Group::find()->select(['group', 'id'])->indexBy('id')->column(), ['prompt' => '']) ?>
    <?= $form->field($model, 'subject')->label('Предмет')->dropDownList(Subject::find()->select(['subject', 'id'])->indexBy('id')->column(), ['prompt' => '']) ?>
    <?= $form->field($model, 'date')->label('Дата')->widget(DatePicker::classname(), [
        'options' => ['value' => date('Y-m-d')],
        'language' => 'ru',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ] ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Дальше', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end();?>

</div><!-- index -->
