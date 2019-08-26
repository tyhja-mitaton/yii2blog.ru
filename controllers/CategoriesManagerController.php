<?php


namespace app\controllers;


use app\models\Category;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class CategoriesManagerController extends Controller
{
    public function actionIndex()
    {
        if (!Yii::$app->user->can('check-post')) {
            throw new ForbiddenHttpException('Access denied');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()->where(['parent_id' => null]),
        ]);
        $rootCat = new Category();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'rootCat' => $rootCat,
        ]);
    }

    public function actionCreate()
    {
        $category = new Category();
        if ($category->load(Yii::$app->request->post())) {
            $category->save();
        }
        return $this->redirect(['index']);
    }

}