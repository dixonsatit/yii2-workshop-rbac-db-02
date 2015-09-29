<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "m_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 */
class MUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['id'], 'integer'],
            [['username', 'email'], 'string', 'max' => 150],
            ['email','email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
        ];
    }

    /**
     * @inheritdoc
     * @return MUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MUserQuery(get_called_class());
    }
}
