<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plus".
 *
 * @property integer $id
 * @property string $operation
 *
 * @property Visit[] $visits
 */
class Plus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'operation' => 'Operation',
        ];
    }
    public function getPlus()
    {
        return $this->operation;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisits()
    {
        return $this->hasMany(Visit::className(), ['plus_id' => 'id']);
    }
}
