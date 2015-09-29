<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MEmpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Memps';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="jumbotron well ">
      <h3>คุณยังไม่ได้รับสิทธ์ในการประเมิน!</h3>
      <p>โปรดติดต่อผู้ดูแลระบบ...</p>
</div> -->

<div class="panel panel-default">
  <div class="panel-body">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Memp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            // 'title',
            // 'name',
            // 'surname',
            // 'user_id',
            'fullname',
            'username',
            // [
            //   'attribute'=>'user_id',
            //   'value'=>'user.username'
            // ],
            [
              'class' => 'yii\grid\ActionColumn',
              'options'=>['style'=>'width:120px;'],
              'buttonOptions'=>['class'=>'btn btn-default'],
              'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
           ],
        ],
    ]); ?>

  </div>
</div>
