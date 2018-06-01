<?php

use yii\helpers\Html;

?>

<?php
    $number;
    echo '<div class="col-lg-6">
    <h2>Сверка данных</h2>';
?>
<p>
<h3><b>Группа: </b><?php echo $group->group; ?><?
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

<?php
    echo '<table class="table table-bordered table-striped">
        <thead>
        <tr>
        <th width="30px">№</th>
            <th>Студент</th>
            <th>Посещаемость</th>
        </tr>
        </thead>
        <tbody>
        ';
    $i = 1;
        foreach ($dataOne as $data)
        {
            echo '<tr>';
            echo '<td>'.$i++.'</td>';
            echo '<td>'.$data['student'].'</td>';
            echo '<td>'.$data['plus'].'</td>';
            echo '</tr>';
        }

        echo '</tbody>
    </table>';?>
<?= Html::beginForm(['main/finish'], 'post');?>
    <p><?= Html::submitButton('Отправить код смс', ['class' => 'btn btn-secondary',
    'value' => '1',
    'type' => 'button','name' => 'sms']) ?></p>

    <div class="input-group">

        <?

        echo '<span class="input-group-btn">';
        echo Html::submitButton('Назад', ['class' => 'btn btn-secondary', 'value' => 'back',
                'type' => 'button','name' => 'back']).'</span>';

        echo Html::textInput('code',null,['class' => 'form-control','placeholder'
        => 'Код из смс...']);

        echo '<span class="input-group-btn">';
        echo Html::submitButton('Дальше', ['class' => 'btn btn-secondary','type' => 'button']).'</span>';

        ?>
    </div>


<?= Html::endForm()?>



</div>


