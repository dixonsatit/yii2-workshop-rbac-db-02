<?php

namespace common\models;
use \Yii;
/**
 * This is the ActiveQuery class for [[ChoiceAnswer]].
 *
 * @see ChoiceAnswer
 */
class ChoiceAnswerQuery extends \yii\db\ActiveQuery
{
    public function byUserId(){
      $this->andWhere('created_by=:created_by',[
        ':created_by'=>Yii::$app->user->id
      ]);
      return $this;
    }

    /**
     * @inheritdoc
     * @return ChoiceAnswer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ChoiceAnswer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
