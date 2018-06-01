<?php
/**
 * Created by PhpStorm.
 * User: Artur Khamidulin
 * Date: 05.03.2018
 * Time: 18:27
 */

namespace app\models;


use yii\db\ActiveRecord;


class Migrate extends ActiveRecord
{

    public static function tableName()
    {
        return 'students';
    }
}