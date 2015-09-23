<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EasyUpload]].
 *
 * @see EasyUpload
 */
class EasyUploadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EasyUpload[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EasyUpload|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}