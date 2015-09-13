<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Html;
/**
 * This is the model class for table "{{%employee}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property string $gender
 * @property string $birthday
 * @property integer $height
 * @property integer $weight
 * @property string $blood_type
 * @property string $ceallphone
 * @property string $personal_id
 * @property string $photo
 * @property integer $nationality
 * @property integer $race
 * @property integer $religion
 * @property string $skill
 * @property double $salary
 * @property integer $department_id
 * @property integer $user_id
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 */
class Employee extends ActiveRecord
{
    public function behaviors(){
      return [
        TimestampBehavior::className(),
        BlameableBehavior::className(),
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => 'skill',
                ActiveRecord::EVENT_BEFORE_UPDATE => 'skill',
            ],
            'value' => function ($event) {
                return $this->arrayToString($this->skill);
            },
        ],
      ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%employee}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','name','surname','skill'], 'required'],
            [['gender'], 'string'],
            [['birthday','skill'], 'safe'],
            [['height', 'weight', 'nationality', 'race', 'religion', 'department_id', 'user_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['salary'], 'number'],
            [['title'], 'string', 'max' => 100],
            [['name', 'surname'], 'string', 'max' => 150],
            [['blood_type'], 'string', 'max' => 10],
            [['ceallphone'], 'string', 'max' => 15],
            [['personal_id'], 'string', 'max' => 17],
            [['photo'], 'file','skipOnEmpty' => true, 'maxFiles' => 2,
            'extensions' => 'png,jpg']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'คำนำหน้า'),
            'name' => Yii::t('app', 'ชื่อ'),
            'surname' => Yii::t('app', 'นามสกุล'),
            'gender' => Yii::t('app', 'เพศ'),
            'birthday' => Yii::t('app', 'วันเกิด'),
            'height' => Yii::t('app', 'ส่วนสูง'),
            'weight' => Yii::t('app', 'น้ำหนัก'),
            'blood_type' => Yii::t('app', 'กรุ๊ฟเลือด'),
            'ceallphone' => Yii::t('app', 'เบอร์โทร'),
            'personal_id' => Yii::t('app', 'หมายเลขบัตรประชาชน'),
            'photo' => Yii::t('app', 'ภาพถ่าย'),
            'nationality' => Yii::t('app', 'สัญชาติ'),
            'race' => Yii::t('app', 'เชื้อชาติ'),
            'religion' => Yii::t('app', 'ศาสนา'),
            'skill' => Yii::t('app', 'ทักษะ'),
            'salary' => Yii::t('app', 'เงินเดือน'),
            'department_id' => Yii::t('app', 'แผนก'),
            'user_id' => Yii::t('app', 'รหัส account พนักงาน'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeQuery(get_called_class());
    }

    public function itemAilas($key){
      $items = [
         'skill'=>[
            'php'  => 'PHP',
            'css' => 'CSSS',
            'html5' => 'Html5',
            'js' => 'Javascript',
            'angularjs' => 'AngularJs',
            'yiiframework'=> ' Yii Framework',
            'node.js'=>'Node.js'
          ]
      ];
      return array_key_exists($key, $items) ? $items[$key] : [];
    }
    public function getItemSkill(){
      return $this->itemAilas('skill');
    }

    public function stringToArray($value){
      return empty($value) ? null :explode(',', $value);
    }

    public function arrayToString($value){
      return is_array($value) ? implode(',', $value) : null ;
    }

  public function getUploadPhoto(){
    return Yii::getAlias('@web').'/uploads/'.$this->photo;
  }

  public function getUploadPhotos(){
    $items = explode(',', $this->photo);
    $img = '';
    foreach ($items as $key => $value) {
      $path = Yii::getAlias('@web').'/uploads/'.$value;
      $img.= Html::img($path);
    }
    return $img;
  }

  public function upload($photo)
  {
      if ($this->validate()) {
          $path = Yii::getAlias('@webroot');
          $photo->saveAs($path.'/uploads/' . $photo->baseName . '.' . $photo->extension);
          return $photo->baseName . '.' . $photo->extension;
      } else {
          return false;
      }
  }
  public function uploadMultiple($photo)
  {
      if ($this->validate()) {
        $filenames = [];
        foreach ($photo as $file) {
                $filename = $file->baseName . '.' . $file->extension;
                $file->saveAs('uploads/' . $filename);
                $filenames[] = $filename;
            }
        return implode(',', $filenames);
      } else {
          return false;
      }
  }

}
