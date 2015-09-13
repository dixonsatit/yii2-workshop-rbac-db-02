<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "{{%choice_item}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property integer $group_id
 * @property integer $status
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 * @property string $type
 */
class ChoiceItem extends \yii\db\ActiveRecord
{
    const STATUS_NOT_ACTIVE = 0;
    const STATUS_ACTIVE = 1;

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
        return '{{%choice_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['type'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
            'group_id' => Yii::t('app', 'Group ID'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @inheritdoc
     * @return ChoiceItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChoiceItemQuery(get_called_class());
    }

    public function itemAilas($key){
      $items = [
        'status'=>[
            self::STATUS_ACTIVE  => 'Active',
            self::STATUS_NOT_ACTIVE => 'Not Active'
         ],
      ];
      return array_key_exists($key, $items) ? $items[$key] : [];
    }
    
    public function getItemStatus(){
      return $this->itemAilas('status');
    }
}
