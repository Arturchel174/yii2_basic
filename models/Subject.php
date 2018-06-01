<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property integer $id
 * @property string $subject
 *
 * @property Visit[] $visits
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject'], 'string', 'max' => 255],
            //[['subject'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Предмет',
        ];
    }
    public function getSub()
    {
        return $this->subject;
    }


    public function getTotalsubject()
    {
        $count = Visit::find()->where(['subject_id' => $this->id])->count();
        $success = Visit::find()->where(['subject_id' => $this->id, 'plus_id' => 1])->count();
        if($count == 0) return 'Нет информации по предмету.';
      else return round($success / $count, 2) * 100 . '%';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisits()
    {
        return $this->hasMany(Visit::className(), ['subject_id' => 'id']);
    }
    
    public function getStudents()
    {
    		return $this->hasMany(Students::className(), ['id' => 'students_id'])
    			->viaTable('visit', ['subject_id' => 'id']);    
    }
}
