<div class="container">
    <div class="product-wrapper-1 appear-animate mb-5">
        <div class="title-link-wrapper pb-1 mb-4">
            <h2 class="title ls-normal mb-0"><?=$category->name?></h2>
            <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More
                Products<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="product-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2">
            <?php if(!empty($models)): ?>
                <?php foreach ($models as $model): ?>
                    <?php $image = \common\components\StaticFunctions::getImage($model->image,'product',$model->id) ?>
                    <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=>$model->id])?>">
                            <img src="<?=$image?>" alt="Product" width="300" height="338">
                        </a>
                        <div class="product-action-horizontal">
                            <a href="#" data-productId = '<?=$model->id?>' class="btn-product-icon btn-cart w-icon-cart add_to_cart" title="Add to cart"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h3 class="product-name">
                            <a href="product-default.html"><?=$model->name?></a>
                        </h3>
                        <div class="product-pa-wrapper">
                            <div class="product-price">
                                $<?=$model->new_price?> - $<?=$model->old_price?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>