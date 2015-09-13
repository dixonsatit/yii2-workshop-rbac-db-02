<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ChoiceItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Choice Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-item-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'value',
            'group_id',
            'status',
            'created_by',
            'created_at',
            'updated_by',
            'updated_at',
            'type',
        ],
    ]) ?>

</div>
