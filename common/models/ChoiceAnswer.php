<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;


/**
 * This is the model class for table "{{%choice_answer}}".
 *
 * @property integer $id
 * @property integer $choice_id
 * @property string $value
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class ChoiceAnswer extends \yii\db\ActiveRecord
{
    public $choice_name;


    public function behaviors(){
      return [
        TimestampBehavior::className(),
        BlameableBehavior::className()
      ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%choice_answer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['value','required'],
            [['choice_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'choice_id' => Yii::t('app', 'Choice ID'),
            'value' => Yii::t('app', 'Value'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return ChoiceAnswerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChoiceAnswerQuery(get_called_class());
    }

    public function getChoiceItem(){
      return $this->hasOne(ChoiceItem::className(),['id'=>'choice_id']);
    }
}
