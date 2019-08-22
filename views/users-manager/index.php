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
    foreach ($dataProvider->models as $model) {
        $user_roles_ar = Yii::$app->authManager->getRolesByUser($model->id);
        $is_editor = array_key_exists('editor', $user_roles_ar);
        $is_moder = array_key_exists('moderator', $user_roles_ar);
        $is_user = array_key_exists('user', $user_roles_ar);
        $usr_role ='';
        switch(true){
            case $is_moder: $usr_role = 'модератор';break;
            case $is_editor: $usr_role = 'редактор';break;
            case $is_user: $usr_role = 'пользователь';break;
            default: $usr_role = 'гость';break;
        } ?>
            <tr>
                <td><?= $model->username ?></td>
                <td><?= $usr_role ?></td>
                <td><?= Html::a('Назначить редактором', ['appoint', 'id' => $model->id, 'role'=>'editor']) ?></td>
                <td><?= Html::a('Убрать из редакторов', ['appoint', 'id' => $model->id, 'role'=>'user']) ?></td>
            </tr>
   <?php }
    ?>
    </table>
</div>