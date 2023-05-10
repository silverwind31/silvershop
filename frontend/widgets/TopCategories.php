<?php


namespace frontend\widgets;


use common\models\ProductCategories;
use yii\bootstrap5\Widget;

class TopCategories extends Widget
{
    public function run()
    {
        $models = ProductCategories::find()->where(['>','parent',0])->andWhere(['status' => 1])->all();
        return $this->render('top-categories',[
            'models'=>$models
        ]);
    }
}