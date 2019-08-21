<?php


namespace app\commands;

use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;
use app\models\User;


class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = Yii::$app->authManager;

        //create roles
        $guest  = $authManager->createRole('guest');
        $moderator  = $authManager->createRole('moderator');
        $editor  = $authManager->createRole('editor');
        $user  = $authManager->createRole('user');

        //create permissions
        $login  = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
        $error  = $authManager->createPermission('error');
        $signUp = $authManager->createPermission('sign-up');
        $createPost = $authManager->createPermission('create-post');
        $updatePost = $authManager->createPermission('update-post');
        $delete = $authManager->createPermission('delete');
        $checkPost = $authManager->createPermission('check-post');
        $appoint = $authManager->createPermission('appoint');

        //add permissions
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($error);
        $authManager->add($signUp);
        $authManager->add($createPost);
        $authManager->add($updatePost);
        $authManager->add($delete);
        $authManager->add($checkPost);
        $authManager->add($appoint);

        //add roles
        $authManager->add($guest);
        $authManager->add($moderator);
        $authManager->add($editor);
        $authManager->add($user);

        //add rule
        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);

        //add rule in roles
        $guest->ruleName  = $userGroupRule->name;
        $moderator->ruleName  = $userGroupRule->name;
        $editor->ruleName  = $userGroupRule->name;
        $user->ruleName  = $userGroupRule->name;

        //add permission per role
        $authManager->addChild($guest, $login);
        $authManager->addChild($guest, $logout);
        $authManager->addChild($guest, $error);
        $authManager->addChild($guest, $signUp);
        //user
        $authManager->addChild($user, $updatePost);
        $authManager->addChild($user, $guest);
        //editor
        $authManager->addChild($editor, $createPost);
        $authManager->addChild($editor, $updatePost);
        $authManager->addChild($editor, $guest);
        //moderator
        $authManager->addChild($moderator, $delete);
        $authManager->addChild($moderator, $checkPost);
        $authManager->addChild($moderator, $appoint);
        $authManager->addChild($moderator, $editor);
        $authManager->addChild($moderator, $user);
    }

    public function actionAppoint($user_id, $user_role)
    {
        $userRole = Yii::$app->authManager->getRole($user_role);
        Yii::$app->authManager->assign($userRole, $user_id);
        $user = User::findIdentity($user_id);
        $user->role = $user_role;
        $user->save();
    }

}