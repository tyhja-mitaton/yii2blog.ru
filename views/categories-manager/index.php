<?php

use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Category */
/* @var $root_cat app\models\Category */

$this->title = 'Управление категориями';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="category-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('category', [
        'model' => $root_cat,
        'lvl' => 0
    ]); ?>
    <hr style="background-color:#1a1a1a; height:2px">
    <?php
    foreach ($dataProvider->models as $model) {
        $sub_cats = new ActiveDataProvider([
            'query' => Category::find()->where(['parent_id' => $model->id])
        ]);
        echo $this->render('category', [
            'model' => $model,
            'sub_cats' => $sub_cats,
            'lvl' => 0
        ]);
    }
    ?>
</div>
