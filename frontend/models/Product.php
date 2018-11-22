<?php
/**
 * Created by PhpStorm.
 * User: Gregor
 * Date: 22.11.2018
 * Time: 17:05
 */

namespace frontend\models;
use yii\db\ActiveRecord;


class Product extends ActiveRecord{

    public static function tableName() {
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}