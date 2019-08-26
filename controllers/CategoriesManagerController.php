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
        $root_cat = new Category();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'root_cat' => $root_cat,
        ]);
    }

    public function actionCreate()
    {
        $category = new Category();
        if ($category->load(Yii::$app->request->post())) {
            $category->parent_id = Yii::$app->request->post()['Category']['parent_id'];
            $category->save();
        }
        return $this->redirect(['index']);
    }

}