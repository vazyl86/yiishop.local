<?php
/**
 * Created by PhpStorm.
 * User: Gregor
 * Date: 22.11.2018
 * Time: 17:05
 */

namespace frontend\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord{

    public static function tableName() {
        return 'category';
    }

    public function getProducts(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}