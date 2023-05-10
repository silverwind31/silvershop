<?php

/** @var yii\web\View $this */

$this->title = 'UBOLD - admin panel';
?>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?=\common\models\Menu::find()->count()?></h3>
                <p>Menus</p>
            </div>
            <div class="icon">
                <i class="fab fa-elementor"></i>
            </div>
            <a href="<?=\yii\helpers\Url::to(['/menu'])?>" class="small-box-footer">More info<i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3><?=\common\models\SocialLinks::find()->count()?></h3>
                <p>Social links</p>
            </div>
            <div class="icon">
                <i class="fas fa-share-alt-square"></i>
            </div>
            <a href="<?=\yii\helpers\Url::to(['/social-links'])?>" class="small-box-footer">More info<i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3><?=\common\models\ProductCategories::find()->count()?></h3>
                <p>Product categories</p>
            </div>
            <div class="icon">
                <i class="fas fa-luggage-cart"></i>
            </div>
            <a href="<?=\yii\helpers\Url::to(['/product-categories'])?>" class="small-box-footer">More info<i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?=\common\models\Product::find()->count()?></h3>
                <p>Products</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="<?=\yii\helpers\Url::to(['/product'])?>" class="small-box-footer">More info<i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?=\common\models\User::find()->count()?></h3>
                <p>Users</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="<?=\yii\helpers\Url::to(['/user'])?>" class="small-box-footer">More info<i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?=\common\models\advantages::find()->count()?></h3>
                <p>Advantages</p>
            </div>
            <div class="icon">
                <i class="fas fa-comment-medical"></i>
            </div>
            <a href="<?=\yii\helpers\Url::to(['/advantages'])?>" class="small-box-footer">More info<i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3><?=\common\models\SectionSlider::find()->count()?></h3>
                <p>Section slider</p>
            </div>
            <div class="icon">
                <i class="fas fa-sliders-h"></i>
            </div>
            <a href="<?=\yii\helpers\Url::to(['/section-slider'])?>" class="small-box-footer">More info<i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?=\common\models\brand::find()->count()?></h3>
                <p>Brands</p>
            </div>
            <div class="icon">
                <i class="far fa-copyright"></i>
            </div>
            <a href="<?=\yii\helpers\Url::to(['/brand'])?>" class="small-box-footer">More info<i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?=\common\models\Districts::find()->count()?></h3>
                <p>Districts</p>
            </div>
            <div class="icon">
                <i class="fas fa-map"></i>
            </div>
            <a href="<?=\yii\helpers\Url::to(['/districts'])?>" class="small-box-footer">More info<i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div> <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?=\common\models\Regions::find()->count()?></h3>
                <p>Regions</p>
            </div>
            <div class="icon">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            <a href="<?=\yii\helpers\Url::to(['/regions'])?>" class="small-box-footer">More info<i class="fa fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
</div>
