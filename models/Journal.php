<?php


namespace app\models;

use yii\db\ActiveRecord;


class Journal extends ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->db1;
    }

    public static function tableName()
    {
        return 'group';
    }
}