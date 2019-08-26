<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Post */
/* @var $categories array */

$this->title = 'Блог';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->can('write-post')): ?>
        <p>Войдите в свой аккаунт чтобы оставить запись</p>
    <?php else: ?>

        <?= $this->render('_form', [
            'model' => $model,
            'categories' => $categories,
        ]) ?>
    <?php endif; ?>

    <?php
    foreach ($dataProvider->models as $model) {
        if ($model->checked) {
            echo $this->render('preview', [
                'model' => $model
            ]);
        }
    }
    ?>

</div>
