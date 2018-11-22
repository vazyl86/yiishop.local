<?php
/**
 * Created by PhpStorm.
 * User: Gregor
 * Date: 22.11.2018
 * Time: 3:14
 */
namespace frontend\components;
use yii\base\Widget;

class MenuWidget extends Widget{

    public $tpl;

    public function init() {
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        //return $this->render('menuView',['data' =>$this->data]);
        return $this->tpl;
    }
}