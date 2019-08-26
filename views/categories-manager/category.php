<?php

/* @var $model app\models\Category */
/* @var $sub_cats yii\data\ActiveDataProvider */

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
<?php if ($sub_cats != null) {
    $lvl++;
    foreach ($sub_cats->models as $sub_cat) {
        $subsub_cats = new ActiveDataProvider([
            'query' => Category::find()->where(['parent_id' => $sub_cat->id])
        ]);
        echo $this->render('category', [
            'model' => $sub_cat,
            'sub_cats' => $subsub_cats,
            'lvl' => $lvl
        ]);
    }
} ?>
