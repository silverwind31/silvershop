<?php


namespace frontend\widgets;


use common\models\Product;
use yii\bootstrap5\Widget;

class SectionProductsTab extends Widget
{
    public function run()
    {
        $top = Product::find()->where(['status'=>1, 'top'=>1])->limit(5)->all();
        $sale = Product::find()->where(['status'=>1, 'sale'=>1])->limit(5)->all();
        $new = Product::find()->where(['status'=>1, 'new'=>1])->limit(5)->all();
        return $this->render('section-products-tab',[
            'top'=>$top,
            'sale'=>$sale,
            'new'=>$new
        ]);
    }
}