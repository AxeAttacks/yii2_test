
<?php
/**
 * Created by PhpStorm.
 * User: Marussia
 * Date: 31.03.2015
 * Time: 12:31
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'login') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'email') ?>
<?= $form->field($person, 'lastname')->textInput(['maxlength' => 30]) ?>
<?= $form->field($person, 'firstname')->textInput(['maxlength' => 30]) ?>
<?= $form->field($person, 'middlename')->textInput(['maxlength' => 30]) ?>
<?= $form->field($person, 'job')->textInput(['maxlength' => 255]) ?>
<?= $form->field($person, 'contract')->textInput(['maxlength' => 6]) ?>
<?= Html::submitButton('Сохранить') ?>
<?php ActiveForm::end(); ?>