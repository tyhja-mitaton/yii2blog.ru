<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $categories array */
/* @var $image app\models\Image */
/* @var $imageLoader app\models\UploadImage */

$this->title = 'Update Post: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['check', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
        'imageLoader' => $imageLoader
    ]) ?>

</div>
<?php if($image->post_id != null): ?>
    <img src="<?=Yii::getAlias('@web') ?>/uploads/<?= $image->path?>" alt="" width="200px">
<?php endif; ?>