<div class="container">
    <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate">Popular Departments
    </h2>
    <div class="tab tab-nav-boxed tab-nav-outline appear-animate">
        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item mr-2 mb-2">
                <a class="nav-link active br-sm font-size-md ls-normal" href="#new">New arrivals</a>
            </li>
            <li class="nav-item mr-2 mb-2">
                <a class="nav-link br-sm font-size-md ls-normal" href="#sale">Best sellers</a>
            </li>
            <li class="nav-item mr-2 mb-2">
                <a class="nav-link br-sm font-size-md ls-normal" href="#top">Most popular</a>
            </li>
        </ul>
    </div>
    <!-- End of Tab -->
    <div class="tab-content product-wrapper appear-animate">
        <div class="tab-pane active pt-4" id="new">
            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                <?php if (!empty($new)): ?>
                    <?php foreach ($new as $product): ?>

                    <?php $image = \common\components\StaticFunctions::getImage($product->image, 'product',$product->id) ?>
                        <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=>$product->id])?>">
                                <img src="<?=$image?>" alt="Product"
                                     width="300" height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" data-productId = '<?=$product->id?>' class="btn-product-icon btn-cart w-icon-cart add_to_cart"
                                   title="Add to cart"></a>
                                <a href="<?=\yii\helpers\Url::to(['/user/add-wishlist', 'id'=>$product->id])?>" class="add_to_wishlist btn-product-icon w-icon-heart"
                                   title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                   title="Quickview"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=>$product->id])?>"><?=$product->name?></a></h4>
                            <div class="product-price">
                                <ins class="new-price"><?=$product->new_price?>$</ins>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- End of Tab Pane -->
        <div class="tab-pane pt-4" id="sale">
            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                <?php if (!empty($sale)): ?>
                    <?php foreach ($sale as $product): ?>

                        <?php $image = \common\components\StaticFunctions::getImage($product->image, 'product',$product->id) ?>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=>$product->id])?>">
                                        <img src="<?=$image?>" alt="Product"
                                             width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" data-productId = '<?=$product->id?>' class="btn-product-icon btn-cart w-icon-cart add_to_cart"
                                           title="Add to cart"></a>
                                        <a href="#" data-id = '<?=$product->id?>' class="add_to_wishlist btn-product-icon btn-wishlist w-icon-heart"
                                           title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quickview"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=>$product->id])?>"><?=$product->name?></a></h4>
                                    <div class="product-price">
                                        <ins class="new-price"><?=$product->new_price?>$</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- End of Tab Pane -->
        <div class="tab-pane pt-4" id="top">
            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                <?php if (!empty($top)): ?>
                    <?php foreach ($top as $product): ?>

                        <?php $image = \common\components\StaticFunctions::getImage($product->image, 'product',$product->id) ?>
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=>$product->id])?>">
                                        <img src="<?=$image?>" alt="Product"
                                             width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" data-productId = '<?=$product->id?>' class="btn-product-icon btn-cart w-icon-cart add_to_cart"
                                           title="Add to cart"></a>
                                        <a href="#" data-id = '<?=$product->id?>' class="add_to_wishlist btn-product-icon btn-wishlist w-icon-heart"
                                           title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                           title="Quickview"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=>$product->id])?>"><?=$product->name?></a></h4>
                                    <div class="product-price">
                                        <ins class="new-price"><?=$product->new_price?>$</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- End of Tab Pane -->
    </div>
    <!-- End of Tab Content -->
</div>
