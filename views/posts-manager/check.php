<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $model app\models\Post */
/* @var $image app\models\Image */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-check">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (Yii::$app->user->can('update-post') && !$model->checked) { ?>
            <?= Html::a('Опубликовать', ['publish', 'id' => $model->id], ['class' => 'btn btn-primary'])
            ?>
        <?php }
        if (Yii::$app->user->can('delete')) { ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'category.title',
            'content:ntext',
            'author.username',
            'date_created',
            'date_updated',
        ],
    ]) ?>

</div>
<?php if($image->post_id != null): ?>
    <img src="<?=Yii::getAlias('@web') ?>/uploads/<?= $image->path?>" alt="" width="200px">
<?php endif; ?>
