<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Addresses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="addresses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'zip')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99999'])->textInput(['placeholder'=>'04001']) ?>

    <?= $form->field($model, 'country')->widget(\yii\widgets\MaskedInput::className(), ['mask' => 'aa'])->
    textInput(['placeholder'=>'UA', 'maxlength' => true, 'minlength' => true, 'style' => 'text-transform:uppercase']) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flat')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
