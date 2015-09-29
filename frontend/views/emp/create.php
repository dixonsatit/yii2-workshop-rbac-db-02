<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Emp */

$this->title = Yii::t('app', 'Create Emp');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Emps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
