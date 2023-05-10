<?php


namespace frontend\widgets;


use yii\bootstrap5\Widget;

class SectionNews extends Widget
{
    public function run()
    {
        return $this->render('section-news');
    }
}