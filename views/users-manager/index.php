<?php

use yii\helpers\Html;

/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление ролями';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <table width="100%" cellspacing="0" border="1">
        <tr>
            <th>Пользователь</th>
            <th>Роль</th>
            <th>Изменить</th>
        </tr>
    <?php
    foreach ($dataProvider->models as $model) {?>
            <tr>
                <td><?= $model->username ?></td>
                <td><?= $model->role ?></td>
                <td><?= Html::a('Назначить редактором', ['appoint', 'id' => $model->id, 'role'=>'editor']) ?></td>
                <td><?= Html::a('Убрать из редакторов', ['appoint', 'id' => $model->id, 'role'=>'user']) ?></td>
            </tr>
   <?php }
    ?>
    </table>
</div>