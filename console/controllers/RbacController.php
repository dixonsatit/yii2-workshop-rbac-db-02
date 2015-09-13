<?php
namespace console\controllers;
use yii\console\Controller;
use yii\helpers\Console;
use \Yii;


class RbacController extends Controller {

  public function actionInit(){
    $auth = Yii::$app->authManager;

    $auth->removeAll();

    $rule = new \common\rbac\AuthorRule;
    $auth->add($rule);

    $update = $auth->createPermission('Update');
    $update->description = 'แก้ไขบทความ';
    $update->ruleName = $rule->name;
    $auth->add($update);

    $author = $auth->createRole('Author');
    $author->description = 'ผู้เขียนบทความ';
    $auth->add($author);

    $manageUser = $auth->createRole('ManageUser');
    $manageUser->description = 'จัดการข้อมูลผู้ใช้งาน';
    $auth->add($manageUser);

    $management = $auth->createRole('Management');
    $management->description = 'จัดการข้อมูลผู้ใช้งาน';
    $auth->add($management);

    $admin = $auth->createRole('Admin');
    $admin->description = 'จัดการข้อมูลผู้ใช้งาน';
    $auth->add($admin);

    $auth->addChild($author,$update);
    $auth->addChild($manageUser,$author);
    $auth->addChild($management,$manageUser);
    $auth->addChild($admin,$management);

    $auth->assign($management, 1);
    $auth->assign($author, 3);

    Console::output('console controller!');
  }

  public function actionRbacUrl(){

    $auth = Yii::$app->authManager;
    $auth->removeAll();

    $rule = new \common\rbac\AuthorRule();
    $auth->add($rule);

    $surveyAll = $auth->createPermission('/survey/*');
    $auth->add($surveyAll);

    $blogAll = $auth->createPermission('/blog/*');
    $auth->add($blogAll);
    $blogIndex = $auth->createPermission('/blog/index');
    $auth->add($blogIndex);
    $blogCreate = $auth->createPermission('/blog/create');
    $auth->add($blogCreate);
    $blogUpdate = $auth->createPermission('/blog/update');
    $blogUpdate->ruleName = $rule->name;
    $auth->add($blogUpdate);
    $blogView = $auth->createPermission('/blog/view');
    $auth->add($blogView);
    $blogDelete = $auth->createPermission('/blog/delete');
    $blogDelete->ruleName = $rule->name;
    $auth->add($blogDelete);

    $author = $auth->createRole('Author');
    $author->description = 'ผู้เขียนบทความ';
    $auth->add($author);

    $admin = $auth->createRole('Admin');
    $admin->description = 'ผู้ดูแลระบบ';
    $auth->add($admin);

    $auth->addChild($author,$blogAll);
    $auth->addChild($author,$surveyAll);
    // $auth->addChild($author,$blogIndex);
    // $auth->addChild($author,$blogView);
    // $auth->addChild($author,$blogCreate);
    $auth->addChild($author,$blogUpdate);
    $auth->addChild($author,$blogDelete);
    $auth->addChild($admin,$author);

    $auth->assign($author, 3);
    $auth->assign($author, 1);

    Console::output('success!');
  }

}
 ?>
