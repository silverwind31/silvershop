<?php


namespace frontend\widgets;


use common\models\Brand;
use common\models\ProductCategories;
use yii\bootstrap5\Widget;

class FilterSidebar extends Widget
{
    public function run(){
        $categories = ProductCategories::find()->where(['status'=>1,'parent'=>null])->all();
        $brands = Brand::find()->all();
        return $this->render('filter-sidebar',[
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }
}