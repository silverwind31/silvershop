<?php


namespace frontend\widgets;


use yii\bootstrap5\Widget;

class LastSeen extends Widget
{
    public function run()
    {
        return $this->render('last-seen');
    }
}