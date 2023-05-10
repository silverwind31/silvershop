<?php

namespace frontend\widgets;

use common\models\Menu;
use common\models\ProductCategories;
use common\models\SiteUsers;

class Header extends \yii\bootstrap5\Widget
{
    public function run(){
        $models = Menu::find()->where(['status'=>1,'position'=>Menu::HEADER_MENU])->andWhere(['parent'=> null])->orderBy(['order_by'=>SORT_ASC])->all();
        $productCategories = ProductCategories::find()->where(['status'=>1,'parent'=>null])->all();
        $user = SiteUsers::findOne(\Yii::$app->user->getId());

        return $this->render('header',[
            'models'=>$models,
            'productCategories'=>$productCategories,
            'user'=> $user
        ]);
    }
}