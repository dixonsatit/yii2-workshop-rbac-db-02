<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ChoiceItem */

$this->title = 'Create Choice Item';
$this->params['breadcrumbs'][] = ['label' => 'Choice Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="choice-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
