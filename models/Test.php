<?php

namespace app\models;

use yii\db\ActiveRecord;

use Yii;



class Test extends ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->db1;
    }

    public static function tableName()
    {
        return 'users';
    }
}