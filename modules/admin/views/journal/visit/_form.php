<?php



use app\models\Students;
use app\models\Teacher;
use app\models\Subject;
use app\models\Plus;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Visit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'students_id')->dropDownList(Students::find()->select(["CONCAT(name, ' ',sur_name)", 'id'])->indexBy('id')->column(), ['prompt' => '']) ?>


    <?= $form->field($model, 'teacher_id')->dropDownList(Teacher::find()->select(["CONCAT(teacher_name, ' ',teacher_sur_name)", 'id'])->indexBy('id')->column(), ['prompt' => '']) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(Subject::find()->select(['subject', 'id'])->indexBy('id')->column(), ['prompt' => '']) ?>

    <?= $form->field($model, 'plus_id')->dropDownList(Plus::find()->select(['operation', 'id'])->indexBy('id')->column(), ['prompt' => '']) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Выберите дату'],
        'language' => 'ru',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ] ]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
