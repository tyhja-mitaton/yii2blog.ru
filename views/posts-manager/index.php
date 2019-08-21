<?php
use yii\helpers\Html;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Post */

$this->title = 'Управление ролями';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    foreach ($dataProvider->models as $model) {
        echo $this->render('preview', [
            'model' => $model
        ]);
    }
    ?>

</div>
