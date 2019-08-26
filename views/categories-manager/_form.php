<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
$lbl = ($model->id) ? 'подкатегорию' : ' категорию';
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(['action' => ['categories-manager/create']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'value' => ''])->label("Добавить $lbl") ?>
    <?= $form->field($model, 'parent_id')->hiddenInput(['value' => $model->id])->label(false) ?>

    <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>


    <?php ActiveForm::end(); ?>

</div>
