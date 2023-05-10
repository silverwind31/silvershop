<?php

function renderMenu($id){

}

?>

<!-- Start of Header -->
<header class="header header-border">
    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="<?=\yii\helpers\Url::home()?>" class="logo ml-lg-0">
                    <img src="/images/logo.png" alt="logo" width="144" height="45" />
                </a>
                <form method="get" action="#" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    <div class="select-box">
                        <select id="category" name="category">
                            <option value="">All Categories</option>
                            <option value="4">Fashion</option>
                            <option value="5">Furniture</option>
                            <option value="6">Shoes</option>
                            <option value="7">Sports</option>
                            <option value="8">Games</option>
                            <option value="9">Computers</option>
                            <option value="10">Electronics</option>
                            <option value="11">Kitchen</option>
                            <option value="12">Clothing</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" name="search" id="search"
                           placeholder="Search in..." required />
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="mailto:#" class="text-capitalize">Live Chat</a> or :</h4>
                        <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                    </div>
                </div>
                <a class="wishlist label-down link d-xs-show" href="<?=\yii\helpers\Url::to(['/user/wishlist'])?>">
                    <i class="w-icon-heart"></i>
                    <span class="wishlist-label d-lg-show">Wishlist</span>
                </a>
                <a class="compare label-down link d-xs-show" href="compare.html">
                    <i class="w-icon-compare"></i>
                    <span class="compare-label d-lg-show">Compare</span>
                </a>
                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                    <div class="cart-overlay"></div>
                    <a href="" class="cart-toggle label-down link">
                        <i class="w-icon-cart">
                            <span class="cart-count"><?=(!empty($_SESSION['cart']['total_count'])) ? $_SESSION['cart']['total_count'] : 0?></span>
                        </i>
                        <span class="cart-label">Cart</span>
                    </a>
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <span>Shopping Cart</span>
                            <a href="#" class="btn-close"></a>
                        </div>

                        <div class="products_cart_inner">

                        </div>

                        <div class="cart-action">
                            <a href="<?=\yii\helpers\Url::to(['/product/basket'])?>" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                            <a href="<?=\yii\helpers\Url::to(['/product/checkout'])?>" class="btn btn-primary  btn-rounded">Checkout</a>
                        </div>
                    </div>
                    <!-- End of Dropdown Box -->
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    <div class="dropdown category-dropdown has-border" data-visible="true">
                        <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" data-display="static"
                           title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>Browse Categories</span>
                        </a>

                        <div class="dropdown-box">
                            <ul class="menu vertical-menu category-menu">

                                <?php if(!empty($productCategories)): ?>
                                    <?php foreach ($productCategories as $category): ?>
                                        <?php $image = \common\components\StaticFunctions::getImage($category->image,'product-categories',$category->id) ?>
                                        <li>
                                    <a href="<?=\yii\helpers\Url::to(['/product/category', 'id'=>$category->id])?>" class="d-flex align-items-center gap-1">
                                        <i class="w-icon-electronics"></i><?=$category->name?>
                                    </a>
                                        <?php if(!empty($category->childCategories)): ?>
                                            <ul class="megamenu">
                                                <?php foreach ($category->childCategories as $childCategory): ?>
                                                    <li>
                                                        <h4 class="menu-title"><?=$childCategory->name?></h4>
                                                        <hr class="divider">
                                                        <?php if (!empty($childCategory->childCategories)): ?>
                                                        <ul>
                                                            <?php foreach ($childCategory->childCategories as $item):?>
                                                            <li><a href="<?=\yii\helpers\Url::to(['/product/category', 'id'=>$item->id])?>"><?=$item->name?></a>
                                                            </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                        <?php  endif;?>
                                                    </li>
                                                <?php endforeach;?>
                                                <li>
                                                    <div class="banner-fixed menu-banner menu-banner2">
                                                        <figure>
                                                            <img src="<?=$image?>" alt="Menu Banner"
                                                                 width="235" height="347" />
                                                        </figure>
                                                    </div>
                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                </li>
                                    <?php endforeach;?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <nav class="main-nav">
                        <ul class="menu active-underline">

                            <?php if(!empty($models)): ?>
                                <?php foreach ($models as $model): ?>
                                <?=\common\components\StaticFunctions::renderMenu($model->id)?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <?php if(empty($user)): ?>
                    <a href="<?=\yii\helpers\Url::to(['/user/login'])?>" class="d-flex align-items-center gap-2"><i class="fas fa-sign-in-alt"></i>Login</a>
                    <a href="<?=\yii\helpers\Url::to(['/user/registration'])?>" class="d-flex align-items-center gap-2"><i class="fas fa-user-plus"></i>Registration</a>

                    <?php else: ?>
                        <a href="<?=\yii\helpers\Url::to(['/user/profile'])?>" class="d-flex align-items-center gap-2" style="margin-right: 0"><i class="fas fa-user"></i>Profile</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of Header -->