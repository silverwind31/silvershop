<?php
$this->title = "Silvershop - " . $model->name;

?>
<!-- Start of Main -->
<main class="main mb-10 pb-1">
    <!-- Start of Breadcrumb -->
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

                <li><a href="<?=\yii\helpers\Url::to(['/product/category','id'=>$category->id])?>"><?=$category->name?></a></li>
                <li><?=$model->name?></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="product product-single row">
                        <div class="col-md-6 mb-6">
                            <div class="product-gallery product-gallery-sticky">
                                <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                    <div class="swiper-wrapper row cols-1 gutter-no">
                                        <?php if(!empty($model->galleryPreview)): ?>
                                            <?php foreach ($model->galleryPreview as $item): ?>
                                                <div class="swiper-slide">
                                                    <figure class="product-image">
                                                        <img src="<?=$item?>"
                                                             data-zoom-image="<?=$item?>"
                                                             alt="<?=$model->name?>" width="800" height="900">
                                                    </figure>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                </div>
                                <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                    <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                        <?php if(!empty($model->galleryPreview)): ?>
                                            <?php foreach ($model->galleryPreview as $item): ?>
                                                <div class="product-thumb swiper-slide">
                                                    <img src="<?=$item?>"
                                                         alt="<?=$model->name?>" width="800" height="900">
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>


                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-6">
                            <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                <h1 class="product-title"><?=$model->name?></h1>

                                <hr class="product-divider">

                                <div class="product-price">
                                    <ins class="new-price">$<?=$model->new_price?></ins>-
                                    <ins class="new-price"><strike>$<?=$model->old_price?></strike></ins>
                                </div>

                                <hr class="product-divider">

                                <div class="product-variation-price">
                                    <span></span>
                                </div>

                                <div class="fix-bottom product-sticky-content">
                                    <div class="product-form container">
                                        <div class="product-qty-form">
                                            <div class="input-group">
                                                <input class="quantity form-control" type="number" min="1"
                                                       max="10000000">
                                                <button class="quantity-plus w-icon-plus"></button>
                                                <button class="quantity-minus w-icon-minus"></button>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-cart">
                                            <i class="w-icon-cart"></i>
                                            <span>Add to Cart</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="social-links-wrapper">
                                    <div class="social-links">
                                        <div class="social-icons social-no-color border-thin">
                                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                            <a href="#"
                                               class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                            <a href="#"
                                               class="social-icon social-youtube fab fa-linkedin-in"></a>
                                        </div>
                                    </div>
                                    <span class="divider d-xs-show"></span>
                                    <div class="product-link-wrapper d-flex">
                                        <a href="#"
                                           class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                        <a href="#"
                                           class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#product-tab-description" class="nav-link active">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-specification" class="nav-link">Specifications</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="product-tab-description">
                                <div class="row mb-4">
                                    <div class="col-md-12 mb-5">
                                        <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                        <?php if(!empty($model->description)): ?>
                                            <?=$model->description?>
                                        <?php else: ?>

                                        <div class="alert alert-danger w-100">No information has not been added!</div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="product-tab-specification">
                                <?php if(!empty($model->productChars)): ?>
                                    <ul class="list-none">
                                        <?php foreach ($model->productChars as $productChar): ?>
                                            <li>
                                                <label><?=$productChar->name?></label>
                                                <p><?=$productChar->value?></p>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <section class="related-product-section">
                        <div class="title-link-wrapper mb-4">
                            <h4 class="title">Related Products</h4>
                        </div>
                        <div class="swiper-container swiper-theme" data-swiper-options="{
                                    'spaceBetween': 20,
                                    'slidesPerView': 2,
                                    'breakpoints': {
                                        '576': {
                                            'slidesPerView': 3
                                        },
                                        '768': {
                                            'slidesPerView': 4
                                        },
                                        '992': {
                                            'slidesPerView': 3
                                        }
                                    }
                                }">
                            <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                                <?php if(!empty($model->relatedProducts)): ?>
                                    <?php foreach ($model->relatedProducts as $product): ?>
                                        <?php $image = \common\components\StaticFunctions::getImage($product->image,'product',$product->id) ?>
                                        <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=>$product->id])?>">
                                            <img src="<?=$image?>" alt="Product"
                                                 width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" data-productid ="<?=$product->id?>" class="add_to_cart btn-product-icon btn-cart w-icon-cart"
                                               title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                               title="Add to wishlist"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=>$product->id])?>"><?=$product->name?></a></h4>
                                        <div class="product-pa-wrapper">
                                            <div class="product-price">$<?=$product->new_price?></div>
                                        </div>
                                    </div>
                                </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- End of Main Content -->
                <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                    <div class="sidebar-content scrollable">
                        <div class="sticky-sidebar">
                            <div class="widget widget-banner mb-9">
                                <div class="banner banner-fixed br-sm">
                                    <figure>
                                        <img src="/images/shop/banner3.jpg" alt="Banner" width="266"
                                             height="220" style="background-color: #1D2D44;" />
                                    </figure>
                                    <div class="banner-content">
                                        <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                            40<sup class="font-weight-bold">%</sup><sub
                                                    class="font-weight-bold text-uppercase ls-25">Off</sub>
                                        </div>
                                        <h4
                                                class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                            Ultimate Sale</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget Banner -->

                            <div class="widget widget-products">
                                <div class="title-link-wrapper mb-2">
                                    <h4 class="title title-link font-weight-bold">More Products</h4>
                                </div>

                                <div class="swiper nav-top">
                                    <div class="swiper-container swiper-theme nav-top" data-swiper-options = "{
                                                'slidesPerView': 1,
                                                'spaceBetween': 20,
                                                'navigation': {
                                                    'prevEl': '.swiper-button-prev',
                                                    'nextEl': '.swiper-button-next'
                                                }
                                            }">
                                        <div class="swiper-wrapper">
                                            <div class="widget-col swiper-slide">
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="/images/shop/13.jpg" alt="Product"
                                                                 width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Smart Watch</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$80.00 - $90.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="/images/shop/14.jpg" alt="Product"
                                                                 width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Sky Medical Facility</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$58.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="/images/shop/15.jpg" alt="Product"
                                                                 width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Black Stunt Motor</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$374.00</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-col swiper-slide">
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="/images/shop/16.jpg" alt="Product"
                                                                 width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Skate Pan</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$278.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="/images/shop/17.jpg" alt="Product"
                                                                 width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">Modern Cooker</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$324.00</div>
                                                    </div>
                                                </div>
                                                <div class="product product-widget">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="/images/shop/18.jpg" alt="Product"
                                                                 width="100" height="113" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h4 class="product-name">
                                                            <a href="#">CT Machine</a>
                                                        </h4>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">$236.00</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="swiper-button-next"></button>
                                        <button class="swiper-button-prev"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- End of Sidebar -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
<!-- End of Main -->