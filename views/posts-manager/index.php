<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Post */

$this->title = 'Публикация записей';
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
<?php echo LinkPager::widget([
    'pagination' => $dataProvider->pagination
]); ?>