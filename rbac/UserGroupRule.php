<?php


namespace app\rbac;

use Yii;
use yii\rbac\Rule;

class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!Yii::$app->user->isGuest) {
            $group = Yii::$app->user->identity->role;
            if ($item->name === 'moderator'){
                return $group == 'moderator';
            }elseif ($item->name === 'editor'){
                return $group == 'moderator' || $group == 'editor';
            }elseif ($item->name === 'user'){
                return $group == 'moderator' || $group == 'user';
            }

        }
        return false;
    }

}