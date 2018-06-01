<?php

namespace app\modules\admin\controllers;

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
class StatisticController extends Controller
{



    public function actionSubjectTable(){
          $subject = Subject::find()
             ->select(['subject', 'id'])
             ->indexBy('id')
             ->column();
        return $this->render('subject-table', ['subject' => $subject, 'post_id']);
    }



    public function actionSubjectTableStat($id = null,$ids=1){
      $subject = Subject::find()
             ->select(['subject', 'id'])
             ->indexBy('id')
             ->column();
      $subjectstat = Subject::findOne($ids);
      return $this -> render('subject-table-stat', compact('subjectstat','id','subject'));
    }

    public function actionTeacherTable(){
        $teacher = Teacher::find()
         ->select(["CONCAT(teacher_sur_name, ' ',teacher_name, ' ',teacher_patronymic_name)", 'id'])
         ->indexBy('id')
         ->column();
        return $this->render('teacher-table', ['teacher' => $teacher]);
    }
    public function actionTeacherTableStat($id = null,$ids=1){
      $teacher = Teacher::find()
             ->select(["CONCAT(teacher_sur_name, ' ',teacher_name, ' ',teacher_patronymic_name)", 'id'])
             ->indexby('id')
             ->column();
      $teacherstat= Teacher::findOne($ids);
      return $this -> render('teacher-table-stat', compact('teacherstat','id','teacher'));
    }



    public function actionGroupTable(){
         $group = Group::find()
             ->select(['group', 'id'])
             ->indexBy('id')
             ->column();
        return $this->render('group-table', ['group' => $group]);
    }



   public function actionGroupStudentTable($id = null,$ids=1){
     $student = Students::find()
             ->where(['group_id' => $id,])->all();
     $group = Group::find()
             ->select(['group', 'id'])
             ->indexBy('id')
             ->column();
     return $this -> render('group-student-table', compact('student','id','group'));
   }



   public function actionGroupStudentTableStat($id = null, $ids=1)
   {
     $student =  Students::find()
             ->where(['group_id' => $id,])
             ->all();
     $studentstat = Students::findOne($ids);
     $group = Group::find()
             ->select(['group','id'])
             ->indexBy('id')
             ->column();
     return $this -> render ('group-student-table-stat', compact('studentstat','student','id','group'));
   }




}
