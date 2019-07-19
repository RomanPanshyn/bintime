<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Addresses */

$this->title = 'Update Address: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'All Users', 'url' => ['users/index']];
$this->params['breadcrumbs'][] = ['label' => 'User '.$model->user_id, 'url' => ['users/view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="addresses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
