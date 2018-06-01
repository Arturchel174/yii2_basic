<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Group;
use app\models\Students;
use app\models\Subject;
use app\models\Teacher;
use app\models\Visit;
use app\models\Plus;
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionPtable(){
          $subject = Subject::find()->select(['subject', 'id'])->indexBy('id')->column();
        return $this->render('ptable', [
            'subject' => $subject, 'post_id'
        ]);
    }
    public function actionPp($id = null){
      $subject1 = Visit::find()
             ->where(['subject_id' => $id,])
             ->select(['students_id'])
             ->column();

      $subject14 = Visit::find()
             ->where(['subject_id' => $id,])
             ->select(['id'])
             ->column();

      $students=$subject14;


      $subject4=$id;
      $id=$subject1;
      $subject = Students::find()
              ->where(['id' => $id,])
              ->select(["CONCAT(name, ' ',sur_name, ' ',patronymic_name)", 'id'])
              ->column();
      $id=$subject4;
      $subject3 = Visit::find()
                ->where(['subject_id' => $id,])
                ->select(["plus_id"])
                ->column();
      $id=$subject3;

      $subject2 = Plus::find()
              ->where(['id' => $id,])
              ->select(['operation'])
              ->column();

      $data = [];

      foreach ($students as $value)
      {
        $model = new Visit;
        $model->students_id = $value;
        $model->plus_id = $value;
        $data[] = $model;
      }

      print_r($data);

    //  return $this -> render('pp', compact('subject','subject2'));
    }

    public function actionPrtable(){
          $teach = Teacher::find()->select(["CONCAT(teacher_sur_name, ' ',teacher_name, ' ',teacher_patronymic_name)", 'id'])->indexBy('id')->column();
        return $this->render('prtable', [
            'teach' => $teach, 'post_id'
        ]);
    }

    public function actionGtable(){
          $group = Group::find()->select(['group', 'id'])->indexBy('id')->column();
        return $this->render('gtable', [
            'group' => $group, 'post_id'
        ]);
    }
    public function actionPr($id = null){
      $teach = Teacher::find()
             ->where(['id' => $id,])
             ->select(["CONCAT(teacher_sur_name, ' ',teacher_name, ' ',teacher_patronymic_name)", 'id'])
             ->column();
      return $this -> render('pr', compact('teach'));
    }
   public function actionGg($id = null){
     $student = Students::find()
            ->where(['group_id' => $id,])->all();
            //->select(["CONCAT(name, ' ',sur_name, ' ',patronymic_name)", 'id'])
            //->column();
     //$group = Group::findOne($id);
     //$student = $group->students;
     // $student = Students::find()
     //    ->select(['group_id'])
     //    ->orderBy('id')
     //    ->all();
     // $student = Students::find($id)->select(["CONCAT(name, ' ',sur_name, ' ',patronymic_name)", 'id'])->indexBy($id)->column();
     //$student = Students::find()->where(['group_id'=>$id])->all();

     return $this -> render('gg', compact('student'));
   }
   public function actionSt($id = null)
   {
		$student = Students::findOne($id);  
		return $this -> render('st', compact('student'));
   }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()){

            return $this->render('entry-confirm', compact('model'));
        } else {
            return $this->render('entry', compact('model'));
        }
    }

}
