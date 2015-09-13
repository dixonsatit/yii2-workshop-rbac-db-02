<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<h1>Profile</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'surname') ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($model, 'website') ?>

<div class="form-group">
    <?= Html::submitButton('Login', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
</div>

<?php ActiveForm::end(); ?>
