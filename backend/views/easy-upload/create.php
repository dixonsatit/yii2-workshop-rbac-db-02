<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EasyUpload */

$this->title = Yii::t('app', 'Create Easy Upload');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Easy Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="easy-upload-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
