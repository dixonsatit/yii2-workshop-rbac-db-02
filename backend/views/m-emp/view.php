<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MEmp */

$this->title = 'View #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Memps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="memp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="panel panel-default">
      <div class="panel-body">
        <h3>Employee</h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'name',
            'surname'
        ],
    ]) ?>
  </div>
  </div>
    <div class="panel panel-default">
      <div class="panel-body">
        <h3>User</h3>
    <?= DetailView::widget([
        'model' => $modelUser,
        'attributes' => [
            'username',
            'email',
        ],
    ]) ?>
  </div>
  </div>
</div>
