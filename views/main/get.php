<?php
use app\models\Students;
use app\models\Teacher;
use app\models\Subject;
use app\models\Plus;
use app\models\Group;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <?php
    echo '<div class="container">';
    ?>
    <p>
    <h3><b>Группа: </b><?php echo $group->group; ?></b><?
        ?></h3>
    </p>
    <p><b>Преподаватель: </b><?php
        echo $teacher->teacher_sur_name.' '.$teacher->teacher_name.' '.$teacher->teacher_patronymic_name.' ';
        ?></p>
    <b>Предмет: </b> <?php
    echo $subject->subject;
    $date_view = date_create($date);
    echo '<h4>'.date_format($date_view, 'j F Y').'</h4>';
    ?>


    <div class="visit-form">

        <?php $form = ActiveForm::begin(['id' => 'SecondForm','action' => ['main/bridge']/*'/statistics.php?r=main%2Fcreate'*/]);?>

        <?php
        echo '<table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th width="40px">№</th>
            <th>Студент</th>
            <th>Посещаемость</th>
        </tr>
        </thead>
        <tbody>
        ';
        $i = 1;
        foreach ($visits as $index => $v)
        {
            echo '<tr>';
            echo '<td>'.$i++.'</td>';
            echo '<td>'.$v->students->sur_name.' '.$v->students->name.'</td>';
            echo '<td>'.$form->field($v, "[$index]plus_id")->dropDownList(Plus::find()->select(['operation', 'id'])
                    ->indexBy('id')->column(), ['style' => 'width:150px !important']).'</td>';
            echo $form->field($v, "[$index]students_id", [
                'template' => "{input}",
                'options' => ['tag' => false]
            ])->hiddenInput();
            echo $form->field($v, "[$index]subject_id", [
                'template' => "{input}",
                'options' => ['tag' => false]
            ])->label('')->hiddenInput();
            echo $form->field($v, "[$index]teacher_id", [
                'template' => "{input}",
                'options' => ['tag' => false]
            ])->label('')->hiddenInput();
            echo $form->field($v, "[$index]date", [
                'template' => "{input}",
                'options' => ['tag' => false]
            ])->label('')->hiddenInput();
            echo '</tr>';


        }

            echo '</tbody>
        </table>';
    echo '</div>';


        ?>




        <div class="form-group">
        <?= Html::submitButton('Дальше', ['class' => 'btn btn-success']) ?>
    </div>
 <?php  ActiveForm::end(); ?>
    </div>

