<?php

use yii\helpers\StringHelper;
use yii\helpers\Html;
?>

<h1><?= Html::a($model->title, ['view', 'id' => $model->id]) ?></h1>
<?php if(Yii::$app->user->can('update-post', ['post' => $model])):?>
<span class="glyphicon glyphicon-pencil" style="display: flex; float:right;">
    <?= Html::a('Изменить', ['update', 'id' => $model->id]) ?></span>
<?php endif; ?>
<div class="meta">
<p>Автор: <?= $model->author->username ?> Дата публикации: <?= $model->date_created ?>
    <?php if($model->date_updated != null):?> Последнее обновление: <?= $model->date_updated; endif ?></p>
</div>

<div class="content">
    <?= StringHelper::truncate($model->content, 100); ?>
</div>