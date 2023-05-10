<?php
$this->title = "Silvershop - " . $category->name;


?>


<div class="inner_page">
    <nav class="breadcrumb-nav mt-5 mb-5">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="<?=\yii\helpers\Url::home()?>">Home</a></li>
                <?php if(!empty($category->parentCategory->parentCategory)):?>
                    <li><a href="<?=\yii\helpers\Url::to(['/product/category','id'=>$category->parentCategory->parentCategory->id])?>"><?=$category->parentCategory->parentCategory->name?></a></li>
                <?php endif; ?>

                <?php if(!empty($category->parentCategory)):?>
                    <li><a href="<?=\yii\helpers\Url::to(['/product/category','id'=>$category->parentCategory->id])?>"><?=$category->parentCategory->name?></a></li>
                <?php endif; ?>
                <li><?=$category->name?></li>
            </ul>
        </div>
    </nav>
    <?php if(!empty($child)): ?>
        <div class="container">
            <!-- Start of Shop Category -->
            <div class="shop-default-category category-ellipse-section mb-6">
                <div class="swiper-container swiper-theme shadow-swiper"
                     data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '480': {
                                    'slidesPerView': 3
                                },
                                '576': {
                                    'slidesPerView': 4
                                },
                                '768': {
                                    'slidesPerView': 6
                                },
                                '992': {
                                    'slidesPerView': 7
                                },
                                '1200': {
                                    'slidesPerView': 8,
                                    'spaceBetween': 30
                                }
                            }
                        }">
                    <div class="swiper-wrapper row gutter-lg cols-xl-8 cols-lg-7 cols-md-6 cols-sm-4 cols-xs-3 cols-2">
                        <?php foreach ($child as $item): ?>
                            <?php $image = \common\components\StaticFunctions::getImage($item->image,'product-categories',$item->id) ?>
                            <div class="swiper-slide category-wrap">
                                <div class="category category-ellipse">
                                    <figure class="category-media">
                                        <a href="<?=\yii\helpers\Url::to(['/product/category', 'id'=>$item->id])?>">
                                            <img src="<?=$image?>" alt="Categroy"
                                                 width="190" height="190" style="background-color: #5C92C0;" />
                                        </a>
                                    </figure>
                                    <div class="category-content">
                                        <h4 class="category-name">
                                            <a href="<?=\yii\helpers\Url::to(['/product/category', 'id'=>$item->id])?>"><?=$item->name?></a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- End of Shop Category -->
        </div>
    <?php endif; ?>
    <div class="container-fluid page-content mt-6 mb-5">
        <!-- Start of Shop Content -->
        <div class="shop-content row gutter-lg">

            <?=frontend\widgets\FilterSidebar::widget()?>
            <!-- Start of Shop Main Content -->
            <div class="main-content">
                <?php if(!empty($products)): ?>
                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                        btn-icon-left d-block d-lg-none"><i
                                        class="w-icon-category"></i><span>Filters</span></a>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <form class="sort_form d-flex align-items-center">
                                    <input type="hidden" name="id" value="<?=$category->id?>">
                                    <label>Sort By :</label>
                                    <select name="orderby" class="form-control sort">
                                        <option value="default" selected="selected">Choose sorting</option>
                                        <option value="price-low" <?=(!empty($_GET['orderby']) && $_GET['orderby'] == 'price-low') ? 'selected' : ''?>>Sort by price: low to high</option>
                                        <option value="price-high" <?=(!empty($_GET['orderby']) && $_GET['orderby'] == 'price-high') ? 'selected' : ''?>>Sort by price: high to low</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show select-box">
                                <select name="count" class="form-control">
                                    <option value="9">Show 9</option>
                                    <option value="12" selected="selected">Show 12</option>
                                    <option value="24">Show 24</option>
                                    <option value="36">Show 36</option>
                                </select>
                            </div>
                        </div>
                    </nav>
                <?php endif; ?>

                <div class="product-wrapper row cols-xl-5 cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                    <?php if(!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <?php $image = \common\components\StaticFunctions::getImage($product->image,'product',$product->id) ?>
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=>$product->id])?>">
                                            <img src="<?=$image?>" alt="Product" width="300"
                                                 height="338" />
                                        </a>
                                        <div class="product-action-horizontal">
                                            <a href="#" data-productid ="<?=$product->id?>" class="add_to_cart btn-product-icon btn-cart w-icon-cart"
                                               title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                               title="Wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                               title="Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-name">
                                            <a href="product-default.html"><?=$product->name?></a>
                                        </h3>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">
                                                $<?=$product->new_price?> - $<?=$product->old_price?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>


                    <?php endif; ?>
                </div>

                <?php if(empty($products)): ?>
                    <div class="alert alert-warning" style="color: #0b0b0b">Products has not been added!</div>

                <?php endif; ?>


            </div>
            <!-- End of Shop Main Content -->

        </div>
        <!-- End of Shop Content -->
    </div>
</div>

