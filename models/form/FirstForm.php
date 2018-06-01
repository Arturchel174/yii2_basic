<?php
/**
 * Created by PhpStorm.
 * User: Artur Khamidulin
 * Date: 02.04.2018
 * Time: 23:19
 */

namespace app\models\form;

use yii\db\ActiveRecord;

class FirstForm extends ActiveRecord
{
    public $teacher;
    public $group;
    public $subject;
    public $date;

    public function attributeLabels()
    {
        return [
            'teacher' => 'Преподаватель',
            'group' => 'Группа',
            'subject' => 'Предмет',
            'date' => 'Дату',
        ];
    }

    public function rules()
    {
        return [
            // 'teacher','group','subject','date' атрибуты обязательны
            [['teacher','group','subject','date'],'required'],

        ];
    }

}

