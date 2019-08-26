<?php


namespace app\controllers;

use app\models\Category;
use app\models\Post;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;


class PostsManagerController extends Controller
{
    public function actionIndex()
    {
        if (!Yii::$app->user->can('check-post')){
            throw new ForbiddenHttpException('Access denied');
        }
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws ForbiddenHttpException if user has no permissions
     */
    public function actionCheck($id)
    {
        if (!Yii::$app->user->can('check-post')){
            throw new ForbiddenHttpException('Access denied');
        }
        return $this->render('check', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws ForbiddenHttpException if user has no permissions
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->can('check-post')){
            throw new ForbiddenHttpException('Access denied');
        }

        $model = $this->findModel($id);
        $categories = Category::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            $model->checked = true;
            $model->category_id = Yii::$app->request->post()['Post']['category_id'];
            $model->save();
            return $this->redirect(['check', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories
        ]);
    }

    public function actionPublish($id)
    {
        if (!Yii::$app->user->can('check-post')){
            throw new ForbiddenHttpException('Access denied');
        }
        $model = $this->findModel($id);
        if(!$model->checked){
            $model->checked = true;
            $model->save();
        }
        return $this->redirect(['index']);

    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws ForbiddenHttpException if user has no permissions
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->can('delete')){
            throw new ForbiddenHttpException('Access denied');
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}