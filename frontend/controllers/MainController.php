<?php
/**
 * Created by PhpStorm.
 * User: Gregor
 * Date: 22.11.2018
 * Time: 2:26
 */

namespace frontend\controllers;


use yii\web\Controller;

class MainController extends Controller {

    public function actionIndex(){
        return $this->render('index');
    }
}