<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visit".
 *
 * @property integer $id
 * @property integer $students_id
 * @property integer $teacher_id
 * @property integer $subject_id
 * @property integer $plus_id
 * @property string $date
 *
 * @property Students $students
 * @property Subject $subject
 * @property Teacher $teacher
 */
class Visit extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['students_id', 'teacher_id', 'subject_id', 'plus_id', 'date'],  'required'],
            [['date'], 'safe'],
            [['students_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['students_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'students_id' => 'Студент',
            'teacher_id' => 'Преподаватель',
            'subject_id' => 'Предмет',
            'plus_id' => 'Посещаемость',
            'date' => 'Дата',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasOne(Students::className(), ['id' => 'students_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }
    public function getPlus()
    {
        return $this->hasOne(Plus::className(), ['id' => 'plus_id']);
    }
}
