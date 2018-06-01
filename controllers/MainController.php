<?php
/**
 * Created by PhpStorm.
 * User: Artur Khamidulin
 * Date: 02.04.2018
 * Time: 22:51
 */

namespace app\controllers;

use app\models\Students;
use yii\web\Controller;
use app\models\form\FirstForm;
use app\models\Group;
use app\models\Plus;
use app\models\Visit;
use app\models\Teacher;
use app\models\Subject;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use Yii;


class MainController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'getbridge' => ['post'],
                    'get' => ['post'],
                    'bridge' => ['post'],
                    'create' => ['post'],
                    'finish' => ['post'],
                ],
            ],
        ];
    }



    public function actionIndex()
    {

        if(Yii::$app->request->isAjax)
        {
            var_dump(Yii::$app->request->post());
            return 'index';
        }
        $model = new FirstForm;



        if ($model->load(Yii::$app->request->post()))
        {

            if ($model->validate()){
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }

        }



        $this->view->title = 'Форма';
        return $this->render('index', [

            'model' => $model,

        ]);

    }

    public function actionGetbridge()
    {
        $items = $_POST['FirstForm'];
        $session = Yii::$app->session;
        $session->set('FirstForm', $items);
        $random = rand(1000,9999);
        $code = (string)$random;
        $session2 = Yii::$app->session;
        $session2->set('code', $code);
        return Yii::$app->runAction('main/get');
    }

    public function actionGet()
    {

        $items = Yii::$app->session->get('FirstForm');
        $teacher = $items['teacher'];
        $group = $items['group'];
        $subject = $items['subject'];
        $date = $items['date'];
        $visits = [];
        $group_table = Group::findOne($group);
        $teacher_table = Teacher::findOne($teacher);
        $subject_table = Subject::findOne($subject);
        $student_table = $group_table->students;


        foreach ($student_table as $value)
        {
            $visit = new Visit();
            $visit->students_id = $value->id;
            $visit->teacher_id = $teacher;
            $visit->subject_id = $subject;
            $visit->date = $date;
            $visits[] = $visit;
        }


        return $this->render('get', [
            'items' => $items, 'group' => $group_table, 'subject' => $subject_table, 'teacher' => $teacher_table, 'date' => $date,
            'student' => $student_table, 'visit' => $visit, 'visits' => $visits,
        ]);
    }

     public function actionBridge()
     {
       $model = $_REQUEST['Visit'];
//       $teacher= ArrayHelper::getValue($model, '0.teacher_id');
//       $teacher_table = Teacher::findOne($teacher);
//       $sms_teacher = $teacher_table->teacher_phone_number;
       $session = Yii::$app->session;
       $session->set('session', $model);
//       $random = rand(1000,9999);
//       $code = (string)$random;
//       $session2 = Yii::$app->session;
//       $session2->set('code', $code);
       //$sms =  Yii::$app->sms->sendSms($sms_teacher, $code, true, 1, 5);
       //return Yii::$app->runAction('main/create').$sms;
         if(!empty($model)){return Yii::$app->runAction('main/create');}
     }

   public function actionCreate()
   {

        $model = Yii::$app->session->get('session');
        $code = Yii::$app->session->get('code');
        $subject = ArrayHelper::getValue($model, '0.subject_id');
        $teacher= ArrayHelper::getValue($model, '0.teacher_id');
        $student = ArrayHelper::getValue($model, '0.students_id');
        $date = ArrayHelper::getValue($model, '0.date');
        $student_table = Students::findOne($student);
        $teacher_table = Teacher::findOne($teacher);
        $subject_table = Subject::findOne($subject);
        $group_table = $student_table->group;

        $visits = [];
        $dataOne = [];


        foreach ($model as $value)
        {
            $student = Students::findOne($value['students_id'])->fio;
            $plus = Plus::findOne($value['plus_id'])->operation;
            $dataOne[] = ['student'=> $student , 'plus'=> $plus];
        }


        return $this->render('create', [
            'model' => $model, 'group' => $group_table, 'subject' => $subject_table, 'teacher' => $teacher_table, 'date' => $date,
            'dataOne' => $dataOne, 'visit' => $visits, 'code' => $code,
        ]);
    }



   /* 
            $result = Yii::$app->sms->send(new Sms([
                "to" => "9193274458",
                "text" => "Hello my friend!",
            ]));*/
            //$response = \Yii::$app->sms->send(new Sms(["to" => "+9193274458","text" => "2334",]));

            //echo $response->code;

    public function actionFinish()
    {

        if(!empty($_REQUEST['sms']))
        {
            $data = Yii::$app->session->get('session');
            $teacher= ArrayHelper::getValue($data, '0.teacher_id');
            $teacher_table = Teacher::findOne($teacher);
            $sms_teacher = $teacher_table->teacher_phone_number;

            $code = Yii::$app->session->get('code');
			$result = Yii::$app->sms->send($sms_teacher, $code);
			if($result == 1)
			{
				return Yii::$app->runAction('main/create');
			}
			else{
				echo "Error";
				}

          
            
        }

        if(!empty($_REQUEST['back']))
        {
            return Yii::$app->runAction('main/get');
        }



        $code = $_REQUEST['code'];
        $true = Yii::$app->session->get('code');


        if($true == $code )
        {
            $data = Yii::$app->session->get('session');


            foreach ($data as $value)
            {

                $visit = new Visit;
                $visit->students_id = $value['students_id'];
                $visit->teacher_id = $value['teacher_id'];
                $visit->subject_id = $value['subject_id'];
                $visit->date = $value['date'];
                $visit->plus_id = $value['plus_id'];
                $visit->save();
            }

            Yii::$app->session->destroy();

            return $this->render('finish', [

                'visit' => $visit,

            ]);
        }else{ return Yii::$app->runAction('main/create');}






    }



}
