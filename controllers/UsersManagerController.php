<?php


namespace app\controllers;

use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;


class UsersManagerController extends Controller
{
    /**
     * Displays list of users.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->can('appoint')){
            throw new ForbiddenHttpException('Access denied');
        }
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Changes a user role.
     * @param integer $id
     * @param string $role
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws ForbiddenHttpException if user has no permissions
     */
    public function actionAppoint($id, $role)
    {
        if (!Yii::$app->user->can('appoint')){
            throw new ForbiddenHttpException('Access denied');
        }
        $model = User::findOne($id);
        if($model->role != $role){
            $user_roles_ar = Yii::$app->authManager->getRolesByUser($id);
            $is_editor = array_key_exists('editor', $user_roles_ar);
            if($is_editor){
                Yii::$app->authManager->revoke(Yii::$app->authManager->getRole('editor'), $id);
            }else{
                $userRole = Yii::$app->authManager->getRole($role);
                Yii::$app->authManager->assign($userRole, $id);
            }
            $model->role = $role;
            $model->save();
        }

        return $this->redirect(['index']);
    }

}