<?php


namespace frontend\widgets;


use yii\bootstrap5\Widget;

class SectionClients extends Widget
{
    public function run()
    {
       return $this->render('section-clients');
    }
}