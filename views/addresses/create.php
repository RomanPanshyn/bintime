<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Addresses */

$this->title = 'Add Address';
$this->params['breadcrumbs'][] = ['label' => 'All Users', 'url' => ['users/index']];
$this->params['breadcrumbs'][] = ['label' => 'User '.$user_id, 'url' => ['users/view', 'id' => $user_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addresses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
