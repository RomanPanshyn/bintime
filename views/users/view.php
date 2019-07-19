<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $modelUsers->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $modelUsers->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $modelUsers->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $modelUsers,
        'attributes' => [
            'id',
            'login',
            'password',
            'name',
            'surname',
            'gender',
            [
                'attribute' => 'date',
                'format' =>  ['date', 'dd-MM-Y HH:mm'],
            ],
            'email:email',
        ],
    ]) ?>

    <h2>Delivery Addresses</h2>
    <p>
        <?= Html::a('Add Address', ['addresses/create', 'id' => $modelUsers->id], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProviderAddresses,
        'filterModel' => $searchModelAddresses,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'zip',
            'country',
            'city',
            'street',
            'house',
            'flat',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                        'update' => function ($url,$model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                                ['addresses/update', 'id' => $model->id], [
                                'title' => Yii::t('yii', 'Update'),]);
                        },
                        'delete' => function ($url,$model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                ['addresses/delete', 'id' => $model->id],
                                ['title' => Yii::t('yii', 'Delete'),
                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                    'data-method' => 'post']);
                        },
                ],
            ],
        ],
    ]); ?>

</div>
