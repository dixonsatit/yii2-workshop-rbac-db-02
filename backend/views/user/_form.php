<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'autocomplete'=>'off']) ?>

    <div class="row">
      <div class="col-xs-6 col-md-6">
          <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
      </div>
      <div class="col-xs-6 col-md-6">
        <?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true]) ?>
      </div>
    </div>


    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'roles')->checkboxList($model->getAllRoles()) ?>

    <?= $form->field($model, 'status')->radioList($model->itemStatus) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
