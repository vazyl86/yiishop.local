<?php
/**
 * Created by PhpStorm.
 * User: Gregor
 * Date: 22.11.2018
 * Time: 3:14
 */
namespace frontend\components;
use yii\base\Widget;
use frontend\models\Category;
use Yii;

class MenuWidget extends Widget{
    /*@var string|null Имя шаблона*/
    public $tpl;
    /*@var array|null Записи из таблицы*/
    public $data;
    /*@var string|null Результат работы функции*/
    public $tree;
    /*@var string|null HTML код шаблона*/
    public $menuHtml;

    public function init() {
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run(){
        //get cache
        $menu = Yii::$app->cache->get('menu');
        if($menu) return $menu;
        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        //set cache
        Yii::$app->cache->set('menu',$this->menuHtml,60);
        return $this->menuHtml;
    }
    /*Строит дерево из массива*/
    public function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node){
            if(!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree){
        $str = '';
        foreach ($tree as $category){
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category){
        ob_start();
        include __DIR__.'/menu_tpl/'.$this->tpl;
        return ob_get_clean();
    }
}