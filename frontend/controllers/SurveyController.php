<?php

namespace frontend\controllers;

use \Yii;
use common\models\ChoiceItem;
use common\models\ChoiceAnswer;
use yii\base\Model;

class SurveyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $ModelChoiceAnswers = $this->loadAnswer();
        if(Model::loadMultiple($ModelChoiceAnswers,Yii::$app->request->post()) &&
           Model::validateMultiple($ModelChoiceAnswers)
        ){
          foreach ($ModelChoiceAnswers as $index => $model) {
            $model->save();
          }
          return $this->refresh();
        }
        return $this->render('index',[
          'ModelChoiceAnswers' => $ModelChoiceAnswers
        ]);
    }

    public function createAnswer(){
      $ChoiceAnswers = [];
      $choices = ChoiceItem::find()->active()->indexBy('id')->all();
      foreach ($choices as $index => $choice) {
        $ChoiceAnswers[] = new ChoiceAnswer([
          'choice_name' => $choice->name,
          'choice_id' => $choice->id
        ]);
      }
      return $ChoiceAnswers;
    }

    public function loadAnswer(){
      $ChoiceAnswers = [];
      $models = ChoiceAnswer::find()->byUserId()->all();
      if($models==null){
         $ChoiceAnswers = $this->createAnswer();
      }else{
        foreach ($models as $key => $model) {
          $model->choice_name =  $model->choiceItem->name;
          $ChoiceAnswers[] = $model;
        }
      }
      return $ChoiceAnswers;
    }

}
