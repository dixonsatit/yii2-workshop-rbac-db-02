<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MEmp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="memp-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <h3>Employee</h3>
        <div class="row">
          <div class="col-md-2">
              <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
          </div>
          <div class="col-md-5">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
          </div>
          <div class="col-md-5">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
          </div>
        </div>    
      </div>
        </div>
  <div class="panel panel-default">
    <div class="panel-body">
        <h3>User</h3>
    <?= $form->field($modelUser, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($modelUser, 'email')->textInput(['maxlength' => true]) ?>
  </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
