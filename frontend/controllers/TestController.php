<?php
/**
 * Created by PhpStorm.
 * User: Gregor
 * Date: 24.11.2018
 * Time: 19:21
 */

namespace frontend\controllers;


use yii\web\Controller;

class TestController extends Controller {
    public function actionIndex(){
        return $this->render('index');
    }
}