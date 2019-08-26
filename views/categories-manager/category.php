<?php

/* @var $model app\models\Category */
/* @var $subCategories yii\data\ActiveDataProvider */

/* @var $lvl integer */

use app\models\Category;
use yii\data\ActiveDataProvider; ?>
<div style="margin-left: <?= 10 * $lvl ?>px;">
    <div>
        <h2><?= $model->title ?></h2>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
<?php if ($subCategories != null) {
    $lvl++;
    foreach ($subCategories->models as $subCategory) {
        $subSubCategories = new ActiveDataProvider([
            'query' => Category::find()->where(['parent_id' => $subCategory->id])
        ]);
        echo $this->render('category', [
            'model' => $subCategory,
            'subCategories' => $subSubCategories,
            'lvl' => $lvl
        ]);
    }
} ?>
