<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Create Post with CKEditor';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= Html::a('Create Post with Not CKEditor', ['createnock'], ['class' => 'btn btn-success']) ?>

<div class="post-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
