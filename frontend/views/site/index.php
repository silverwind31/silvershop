<?php

/** @var yii\web\View $this */

use frontend\widgets\Advantages;
use frontend\widgets\SectionSlider;
use frontend\widgets\TopCategories;

$this->title = 'Online store - Silvershop';
?>
<?=SectionSlider::widget() ?>
<?=Advantages::widget() ?>
<?=TopCategories::widget()?>
<?=\frontend\widgets\SectionProductsTab::widget()?>
<?=\frontend\widgets\SectionCategoryProducts::widget([
    'categoryId' => '7'
])?>
<?=\frontend\widgets\SectionCategoryProducts::widget([
    'categoryId' => '9'
])?>
<?=\frontend\widgets\SectionClients::widget()?>
<?=\frontend\widgets\SectionNews::widget()?>
