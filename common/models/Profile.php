<?php
namespace common\models;
use Yii;
use yii\base\Model;

class Profile extends Model {

    public $title;
    public $name;
    public $surname;
    public $email;
    public $website;

    public function rules(){
      return [
        [['title','name','surname','website','email'],'required'],
        ['email','email'],
        ['website','url','message'=>'ชื่อเว็บไม่ถูกต้อง'],
      ];
    }

    public function getFullname(){
      return $this->title.$this->name.' '.$this->surname;
    }
}
?>
