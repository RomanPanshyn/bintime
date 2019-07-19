<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelUsers, 'login')->textInput(['maxlength' => true, 'minlength' => true]) ?>

    <?= $form->field($modelUsers, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($modelUsers, 'name')->textInput(['maxlength' => true, 'style' => 'text-transform:capitalize']) ?>

    <?= $form->field($modelUsers, 'surname')->textInput(['maxlength' => true, 'style' => 'text-transform:capitalize']) ?>

    <?= $form->field($modelUsers, 'gender')->dropDownList(['male' => 'male', 'female' => 'female', 'no_information'=>'no information']) ?>

    <?= $form->field($modelUsers, 'email')->textInput(['maxlength' => true]) ?>

    <h2>Address</h2>

    <?= $form->field($modelAddresses, 'zip')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '99999'])->textInput(['placeholder'=>'04001']) ?>

    <?= $form->field($modelAddresses, 'country')->widget(\yii\widgets\MaskedInput::className(), ['mask' => 'aa'])->
    textInput(['placeholder'=>'UA', 'maxlength' => true, 'minlength' => true, 'style' => 'text-transform:uppercase']) ?>

    <?= $form->field($modelAddresses, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelAddresses, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelAddresses, 'house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelAddresses, 'flat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
