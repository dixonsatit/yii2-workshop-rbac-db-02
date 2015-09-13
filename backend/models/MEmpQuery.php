<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MEmp]].
 *
 * @see MEmp
 */
class MEmpQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MEmp[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MEmp|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}