<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "m_emp".
 *
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property integer $user_id
 */
class MEmp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_emp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
            'id' => 'ID',
            'title' => 'Title',
            'name' => 'Name',
            'surname' => 'Surname',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @inheritdoc
     * @return MEmpQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MEmpQuery(get_called_class());
    }
}
