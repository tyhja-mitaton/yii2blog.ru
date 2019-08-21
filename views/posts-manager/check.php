<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $model app\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-check">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(Yii::$app->user->can('update-post') && !$model->checked){?>
            <?= Html::a('Опубликовать', ['publish', 'id' => $model->id], ['class' => 'btn btn-primary'])
            ?>
        <?php }if(Yii::$app->user->can('delete')){?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content:ntext',
            'author.username',
            'date_created',
            'date_updated',
        ],
    ]) ?>

</div>