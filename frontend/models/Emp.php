<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%m_emp}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property integer $user_id
 */
class Emp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%m_emp}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['name', 'surname'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return EmpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmpQuery(get_called_class());
    }
}
