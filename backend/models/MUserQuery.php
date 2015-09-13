<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MUser]].
 *
 * @see MUser
 */
class MUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}