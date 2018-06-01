<?php

namespace app\controllers;

use app\models\Group;
use app\models\Students;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Test;

class TestController extends Controller
{

    public function actionDelete()
    {
        $delete = Test::findOne(4);
        $delete->delete();

        return $this->render('delete',compact(delete));
    }
    public function actionUpdate()
    {
        $update = Test::findOne(4);
        $update->name = 'Nikita';
        $update->age = '26';
        $update->birthday = '1998-12-12';
        $update->save();

        return $this->render('update', compact('update'));
    }

    public function actionInsert()
    {
        $insert = new Test;
        $insert->name = 'Alex';
        $insert->age = 30;
        $insert->birthday = '1992-12-12';
        $insert->save();

        return $this->render('insert', compact('insert'));
    }

    public function actionGroup()
    {
        $group = Group::find()->select(['group', 'id'])->indexBy('id')->column();
        return $this->render('group', [
            'group' => $group,
        ]);
    }

    public function actionGg($id = null){
        //$group = Group::findOne($id);
        //$student = $group->students;
        $student = Students::find()
            ->where(['group_id' => $id,])->select(["CONCAT(name, ' ',sur_name, ' ',patronymic_name)", 'id'])->column();
        // $student = Students::find($id)->select(["CONCAT(name, ' ',sur_name, ' ',patronymic_name)", 'id'])->indexBy($id)->column();
        //$student = Students::find()->where(['group_id'=>$id])->all();
        return $this -> render('gg', compact('student'));
    }

    public function actionIndex()
    {
        //$query = Test::find();


        // find создания объекта запроса all получение данных в виде объектов

        // $countries = Test::find()->all(); //SELECT * FROM `users`
        //$countries = Test::find()->orderBy(['id' => SORT_DESC])->all();   //SELECT * FROM `users` ORDER BY `id` DESC
        //$countries = Test::find()->asArray()->all();

                            //SELECT * FROM `users` WHERE `name`='artur' ORDER BY `id` DESC
       // $countries = Test::find()->orderBy(['id' => SORT_DESC])->where(['name'=>'artur'])->all();

                            //SELECT * FROM `users` WHERE `id` > '1' ORDER BY `id` DESC

                                                 #   OR И AND

       //$countries = Test::find()->orderBy(['id' => SORT_DESC])->where(['>=','age','19'])->orWhere(['<=','age','22'])->all();
       $countries = Test::find()->orderBy(['id' => SORT_DESC])->where(['>=','age','19'])->andWhere(['<=','age','22'])->all();

                                        #SELECT * FROM `country` WHERE `code`='US'
        //$countries = Test::find()->asArray()->where(['code'=> 'US'])->all();

        $a = $countries;




        return $this->render('index', [
            'a' => $a,
            
        ]);
    }
}