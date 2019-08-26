<?php

/* @var $model app\models\Category */
/* @var $subCats yii\data\ActiveDataProvider */

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
<?php if ($subCats != null) {
    $lvl++;
    foreach ($subCats->models as $subCat) {
        $subSubCats = new ActiveDataProvider([
            'query' => Category::find()->where(['parent_id' => $subCat->id])
        ]);
        echo $this->render('category', [
            'model' => $subCat,
            'subCats' => $subSubCats,
            'lvl' => $lvl
        ]);
    }
} ?>
