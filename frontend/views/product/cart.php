<div class="products">
    <?php if(!empty($_SESSION['cart']['products'])): ?>
        <?php foreach ($_SESSION['cart']['products'] as $key=>$product): ?>
            <?php $image = \common\components\StaticFunctions::getImage($product['image'], 'product',$key)?>
            <div class="product product-cart">
                <div class="product-detail">
                <a href="product-default.html" class="product-name"><?=$product['name']?>
                </a>
                <div class="price-box">
                    <span class="product-quantity"><?=$product['count']?></span>
                    <span class="product-price">$<?=$product['price']?></span>
                </div>
            </div>
                <figure class="product-media">
                <a href="product-default.html">
                    <img src="<?=$image?>" alt="product"style="height: 94px; width: 90%"
                         width="94" />
                </a>
            </figure>
                <button data-id="<?=$key?>" class="btn btn-link btn-close close_btn" aria-label="button">
                <i class="fas fa-times"></i>
            </button>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<div class="cart-total">
    <div class="count_item">
        <label>Total price:</label>
        <span class="price">$<?=(!empty($_SESSION['cart']['total_price'])) ? $_SESSION['cart']['total_price'] : 0?></span>
    </div><div class="count_item">
        <label>Total count:</label>
        <span class="price"><?=(!empty($_SESSION['cart']['total_count'])) ? $_SESSION['cart']['total_count'] : 0?></span>
    </div>

</div>

