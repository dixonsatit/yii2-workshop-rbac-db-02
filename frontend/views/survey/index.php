<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
<h1>survey/index</h1>
<table class="table table-striped">
  <tbody>
    <?php foreach ($ModelChoiceAnswers as $index => $answer): ?>
    <tr>
      <td>
        <?=$answer->choice_name; ?>
      </td>
      <td>
       <?= $form->field($answer, "[$index]value")->inline()->radioList(['1'=>'1','2'=>'2']) ?>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>
</table>
<div class="form-group">
    <?= Html::submitButton('Save', ['class' =>'btn btn-success btn-block btn-lg']) ?>
</div>
<?php ActiveForm::end(); ?>
