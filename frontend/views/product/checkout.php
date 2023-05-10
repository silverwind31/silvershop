<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Url;

$this->title = "Silvershop - Checkout";
?>
<!-- Start of Main -->
<main class="main checkout">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="active"><a href="<?=\yii\helpers\Url::home()?>">Home</a></li>
                <li class="active"><a href="<?=\yii\helpers\Url::to(['/product/basket'])?>">Cart</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <?php if(!empty($_SESSION['cart']['products'])): ?>
        <div class="page-content">
        <div class="container">
            <div class="mb-3">
                Do you have an account? Please
                <a href="<?=\yii\helpers\Url::to(['/user/login'])?>" class="show-login font-weight-bold text-uppercase text-dark">Login</a>
            </div>
                <?php $form = \yii\bootstrap5\ActiveForm::begin([
                    'options'=>[
                            'class'=> 'form checkout-form'
                    ]
                ])?>
                    <?=$form->field($model,'total_price')->hiddenInput(['value'=>$_SESSION['cart']['total_price']])->label(false)?>
                    <?=$form->field($model,'total_products_count')->hiddenInput(['value'=>$_SESSION['cart']['total_count']])->label(false)?>
                    <div class="row mb-9">
                    <div class="col-lg-7 pr-lg-4 mb-4">
                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Billing Details
                        </h3>
                        <div class="row gutter-sm">
                            <div class="col-xs-6">
                                <?=$form->field($model,'fio')?>
                            </div>
                            <div class="col-xs-6">
                                <?=$form->field($model,'phone')?>
                            </div>
                        </div>
                        <div class="row gutter-sm">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?=$form->field($model,'district_id')->dropDownList($model->getDistricts(),[
                                        'class'=> 'form-control'
                                    ])?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?=$form->field($model, 'district_id')->widget(DepDrop::classname(), [
                                        'options'=>['id'=>'subcat-id'],
                                        'pluginOptions'=>[
                                            'depends'=>['shoporder-district_id'],
                                            'placeholder'=>'Select...',
                                            'url'=>Url::to(['/product/region'])
                                        ]
                                    ]);?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <?=$form->field($model,'address')->textarea([
                                'class'=> 'form-control',
                                'style'=>[
                                    'resize'=>'none'
                                ]
                            ])?>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                        <div class="order-summary-wrapper sticky-sidebar">
                            <h3 class="title text-uppercase ls-10">Your Order</h3>
                            <div class="order-summary">
                                <table class="order-table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">
                                            <b>Product</b>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($_SESSION['cart']['products'])): ?>
                                            <?php foreach ($_SESSION['cart']['products'] as $product): ?>
                                                <tr class="bb-no">
                                                <td class="product-name"><?=$product['name']?><i
                                                        class="fas fa-times"></i> <span
                                                        class="product-quantity"><?=$product['count']?></span></td>
                                                <td class="product-total">$<?=$product['price']?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr class="cart-subtotal bb-no">
                                                <td>
                                                    <b>Subtotal</b>
                                                </td>
                                                <td>
                                                    <b>$<?=(!empty($_SESSION['cart']['total_price'])) ? $_SESSION['cart']['total_price'] : 0?></b>
                                                </td>
                                            </tr>

                                            <?php else: ?>
                                            tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Subtotal</b>
                                            </td>
                                            <td>
                                                <b>$0</b>
                                            </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                    <tr class="shipping-methods">
                                        <td colspan="2" class="text-left">
                                            <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                            </h4>
                                            <ul id="shipping-method" class="mb-4">
                                                <li>
                                                    <div class="custom-radio">
                                                        <input type="checkbox" id="free-shipping""
                                                               class="custom-control-input" name="shipping">
                                                        <label for="free-shipping"
                                                               class="custom-control-label color-dark">Delivery to home + ($<?=Yii::$app->params['delivery_price']?>)</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>
                                            <b>Total</b>
                                        </th>
                                        <td>
                                            <b>$<?=$_SESSION['cart']['total_price'] + 20?></b>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>

                                <div class="form-group place-order pt-6">
                                    <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php \yii\bootstrap5\ActiveForm::end() ?>
        </div>
    </div>
    <?php else: ?>
    <div class="container mb-6">
        <div class="alert alert-danger w-100">Products has not been added!</div>
    </div>
    <?php endif; ?>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->