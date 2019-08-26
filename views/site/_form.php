<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
/* @var $categories array*/

$items = ArrayHelper::map($categories, 'id', 'title');
$params = ['prompt' => 'Выберите категорию'];
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'value' => '']) ?>
    <?= $form->field($model, 'category_id')->dropDownList($items, $params)->label('Категория') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6, 'value' => '']) ?>


    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
