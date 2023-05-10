<?php


namespace frontend\widgets;


use yii\bootstrap5\Widget;

class SectionSlider extends Widget
{
    public function run(){
        $models = \common\models\SectionSlider::find()->where(['status'=>1])->orderBy(['created_date'=>SORT_DESC])->all();
        return $this->render('section-slider',[
            'models'=>$models
        ]);
    }
}