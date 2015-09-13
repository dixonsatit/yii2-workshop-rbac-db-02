<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ChoiceItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Choice Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Choice Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'value',
            'group_id',
            'status',
            // 'created_by',
            // 'created_at',
            // 'updated_by',
            // 'updated_at',
            // 'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
