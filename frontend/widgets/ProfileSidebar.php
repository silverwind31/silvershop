<?php


namespace frontend\widgets;


use yii\bootstrap5\Widget;

class ProfileSidebar extends Widget
{
    public function run(){
        return $this->render('profile-sidebar');
    }
}