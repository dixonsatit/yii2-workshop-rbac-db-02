<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use common\models\Department;

/* @var $this yii\web\View */
/* @var $model common\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin([
      'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="row">
      <div class="col-sm-2">
          <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-5">
          <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-sm-5">
          <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
        <div class="col-md-4">
           <?= $form->field($model, 'gender')->dropDownList([ 'm' => 'M', 'w' => 'W', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-4">
          <?= $form->field($model, 'birthday')->widget(DatePicker::classname(), [
             'options' => ['placeholder' => 'Enter birth date ...'],
             'language'=>'th',
             'pluginOptions' => [
                 'autoclose'=>true,
                 'format' => 'yyyy-mm-dd'
             ]
          ]) ?>

        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'height')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
          <?= $form->field($model, 'weight')->textInput() ?>
        </div>
        <div class="col-md-3">
          <?= $form->field($model, 'blood_type')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
          <?= $form->field($model, 'ceallphone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
          <?= $form->field($model, 'personal_id')->widget(\yii\widgets\MaskedInput::className(), [
              'mask' => '9-9999-99999-99-9',
          ]) ?>
        </div>
    </div>

      <div class="row">
          <div class="col-md-3">
          <?= $form->field($model, 'photo')->fileInput() ?>
          </div>
          <div class="col-md-3">
            <?= $form->field($model, 'nationality')->textInput() ?>
          </div>
          <div class="col-md-3">
          <?= $form->field($model, 'race')->textInput() ?>
          </div>
          <div class="col-md-3">
          <?= $form->field($model, 'religion')->textInput() ?>
          </div>
      </div>

<div class="row">
  <div class="col-md-4">
    <?php
    //  $form->field($model, 'skill')->widget(Select2::classname(), [
    //     'data' => $model->getItemSkill(),
    //     'options' => [ 'multiple' => true,'placeholder' => 'Select a state ...'],
    //     'pluginOptions' => [
    //         'allowClear' => true
    //     ],
    // ]);
    ?>
    <?= $form->field($model, 'skill')->checkboxList($model->getItemSkill());
    ?>
  </div>
  <div class="col-md-4">
    <?= $form->field($model, 'salary')->textInput() ?>
  </div>
  <div class="col-md-4">
      <?= $form->field($model, 'department_id')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Department::find()->all(),'id','name'),
          'options' => ['placeholder' => 'Select a state ...'],
          'pluginOptions' => [
              'allowClear' => true
          ],
      ]);
      ?>
  </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
