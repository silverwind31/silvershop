<?php


namespace frontend\widgets;


use yii\bootstrap5\Widget;

class Advantages extends Widget
{
    public function run(){
        $models = \common\models\Advantages::find()->where(['status'=>1])->all();
        return $this->render('advantages',[
            'models'=> $models
        ]);
    }
}