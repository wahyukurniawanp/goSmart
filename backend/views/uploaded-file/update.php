<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UploadedFile */

$this->title = 'Update Uploaded File: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Uploaded Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uploaded-file-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
