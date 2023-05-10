<?php
$this->title = "Silvershop - Cart";

$continueLink = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : \yii\helpers\Url::home();
?>

<!-- Start of Main -->
<main class="main cart">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="active"><a href="<?=\yii\helpers\Url::home()?>">Home</a></li>
                <li>Cart</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg mb-10">
                <div class="col-lg-8 pr-lg-4 mb-6">
                    <table class="shop-table cart-table">
                        <thead>
                        <tr>
                            <th class="product-name"><span>Product</span></th>
                            <th></th>
                            <th class="product-price"><span>Price</span></th>
                            <th class="product-quantity"><span>Quantity</span></th>
                            <th class="product-subtotal"><span>Subtotal</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($_SESSION['cart'])): ?>
                                <?php foreach ($_SESSION['cart']['products'] as $key => $product): ?>
                                <?php $image = \common\components\StaticFunctions::getImage($product['image'], 'product',$key) ?>
                                    <tr>
                                    <td class="product-thumbnail">
                                        <div class="p-relative">
                                            <a href="<?=\yii\helpers\Url::to(['product/view', 'id'=>$key])?>">
                                                <figure>
                                                    <img src="<?=$image?>" alt="product"
                                                         width="300" height="338">
                                                </figure>
                                            </a>
                                            <button type="submit" class="btn btn-close"><i
                                                        class="fas fa-times"></i></button>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=> $key])?>">
                                            <?=$product['name']?>
                                        </a>
                                    </td>
                                    <td class="product-price"><span class="amount">$<?=$product['price']?></span></td>
                                    <td class="product-quantity">
                                        <div class="input-group">
                                            <input class="form-control" type="number" min="1" max="100000" value="<?=$product['count']?>">
                                            <a href="<?=\yii\helpers\Url::to(['/product/increase-product', 'id'=>$key])?>" class="input_item quantity-plus w-icon-plus"></a>
                                            <a href="<?=($product['count'] >= 1) ? \yii\helpers\Url::to(['/product/decrease-product', 'id'=>$key]) : '#'?>" class="input_item quantity-minus w-icon-minus"></a>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">$<?=$product['price'] * $product['count']?></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="cart-action mb-6 d-flex justify-content-between">
                        <?php if(!empty($_SESSION['cart']['products'])): ?>
                            <a href="<?=\yii\helpers\Url::to(['product/clear-cart'])?>" class="btn btn-rounded btn-default btn-clear">Clear Cart</a>
                            <a href="<?=$continueLink?>" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto">Continue Shopping<i class="w-icon-long-arrow-right"></i></a>

                            <?php else: ?>
                            <div class="alert alert-danger w-100">No products has been added! Go <a href="<?=\yii\helpers\Url::home()?>">Home</a></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4 sticky-sidebar-wrapper">
                    <div class="sticky-sidebar">
                        <div class="cart-summary mb-4">
                            <h3 class="cart-title text-uppercase">Cart Totals</h3>
                            <div class="order-total d-flex justify-content-between align-items-center">
                                <label>Total</label>
                                <span class="ls-50">$<?=(!empty($_SESSION['cart']['total_price'])) ? $_SESSION['cart']['total_price'] : 0?></span>
                            </div>
                            <?php if(!empty($_SESSION['cart']['products'])): ?>
                            <a href="<?=\yii\helpers\Url::to(['/product/checkout'])?>"
                               class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>