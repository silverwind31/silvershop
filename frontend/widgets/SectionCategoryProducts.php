<?php


namespace frontend\widgets;


use common\models\Product;
use common\models\ProductCategories;
use yii\bootstrap5\Widget;

class SectionCategoryProducts extends Widget
{
    public $categoryId;
    public function run()
    {
        $category = ProductCategories::findOne($this->categoryId);
        $models = Product::find()->where(['status' => 1, 'category_id'=>$category->id])->all();
       return $this->render('section-category-products',[
           'category'=>$category,
           'models'=>$models
       ]);
    }
}