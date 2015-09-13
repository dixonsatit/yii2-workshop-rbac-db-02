<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MEmp */

$this->title = 'Create Memp';
$this->params['breadcrumbs'][] = ['label' => 'Memps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
      'model' => $model,
      'modelUser'=>$modelUser
    ]) ?>

</div>
