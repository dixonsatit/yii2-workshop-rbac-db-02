<?php

namespace backend\models;

use Yii;
use \yii\web\UploadedFile;
use \yii\helpers\ArrayHelper;
use \yii\helpers\Html;
/**
 * This is the model class for table "{{%easy_upload}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $photo
 * @property string $photos
 */
class EasyUpload extends \yii\db\ActiveRecord
{
    public $upload_foler ='uploads';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%easy_upload}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['name', 'surname'], 'string', 'max' => 100],
            [['photo'], 'file',
              'skipOnEmpty' => true,
              //'maxFiles' => 2,
              'extensions' => 'png,jpg'
            ],
            [['photos'], 'file',
              'skipOnEmpty' => true,
              'maxFiles' => 3,
              'extensions' => 'png,jpg'
            ]
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
            'surname' => Yii::t('app', 'Surname'),
            'photo' => Yii::t('app', 'Photo'),
            'photos' => Yii::t('app', 'Photos'),
        ];
    }

    /**
     * @inheritdoc
     * @return EasyUploadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EasyUploadQuery(get_called_class());
    }

    public function upload($model,$attribute)
    {
        $photo  = UploadedFile::getInstance($model, $attribute);
          $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = md5($photo->baseName.time()) . '.' . $photo->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
            if($photo->saveAs($path.$fileName)){
              return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function uploadMultiple($model,$attribute)
    {
      $photos  = UploadedFile::getInstances($model, $attribute);
      $path = $this->getUploadPath();
      if ($this->validate() && $photos !== null) {
          $filenames = [];
          foreach ($photos as $file) {
                  $filename = md5($file->baseName.time()) . '.' . $file->extension;
                  if($file->saveAs($path . $filename)){
                    $filenames[] = $filename;
                  }
          }
          if($model->isNewRecord){
            return implode(',', $filenames);
          }else{
            return implode(',',(ArrayHelper::merge($filenames,$model->getOwnPhotosToArray())));
          }
      }

      return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath(){
      return Yii::getAlias('@webroot').'/'.$this->upload_foler.'/';
    }

    public function getUploadUrl(){
      return Yii::getAlias('@web').'/'.$this->upload_foler.'/';
    }

    public function getPhotoViewer(){
      return empty($this->photo) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrl().$this->photo;
    }

    public function getPhotosViewer(){
      $photos = $this->photos ? @explode(',',$this->photos) : [];
      $img = '';
      foreach ($photos as  $photo) {
        $img.= ' '.Html::img($this->getUploadUrl().$photo,['class'=>'img-thumbnail','style'=>'max-width:100px;']);
      }
      return $img;
    }

    public function getOwnPhotosToArray()
    {
      return $this->getOldAttribute('photos') ? @explode(',',$this->getOldAttribute('photos')) : [];
    }
}
