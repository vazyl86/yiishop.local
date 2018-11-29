<?php
/**
 * Created by PhpStorm.
 * User: Gregor
 * Date: 23.11.2018
 * Time: 13:57
 */

namespace frontend\controllers;
use frontend\models\Category;
use frontend\models\Product;
use Yii;
use yii\data\Pagination;


class CategoryController extends AppController {

    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER');
        return $this->render('index', compact('hits'));
    }

    public function actionView($id){
//        $id = Yii::$app->request->get('id');

        $category = Category::findOne($id);
        if(empty($category))throw new \yii\web\HttpException(404, 'Такой категории нет.');

        //$products = Product::find()->where(['category_id' => $id])->all();
        $query = $products = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta('E-SHOPPER | '. $category->name, $category->keywords, $category->description);
        return $this->render('view',compact('products','pages', 'category'));
    }

    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('E-SHOPPER | '. $q);
        if(!$q) return $this->render('search');
        $query = $products = Product::find()->where(['like','name',$q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search',compact('products','pages','q'));
    }
}