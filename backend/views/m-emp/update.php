<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MEmp */

$this->title = 'Update Memp: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Memps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="memp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
      'model' => $model,
      'modelUser'=>$modelUser
    ]) ?>

</div>
