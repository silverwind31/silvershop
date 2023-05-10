<?php


namespace common\models;

use \yii\base\Model;

class Cart extends \yii\base\Model
{
    public function addToCart($product,$quantity = 1){
        $_SESSION['cart']['products'][$product->id]['name'] = $product->name;
        $_SESSION['cart']['products'][$product->id]['image'] = $product->image;
        $_SESSION['cart']['products'][$product->id]['price'] = $product->new_price;
        $_SESSION['cart']['products'][$product->id]['count'] = (empty($_SESSION['cart']['products'][$product->id]['count'])) ? 1 : $_SESSION['cart']['products'][$product->id]['count'] + $quantity;
        $_SESSION['cart']['total_count'] = 0;
        $_SESSION['cart']['total_price'] = 0;
        if(!empty($_SESSION['cart']['products'])){
            foreach ($_SESSION['cart']['products'] as $key=> $product){

                if($product['count'] == 0){
                    unset($_SESSION['cart']['products'][$key]);
                }

                $_SESSION['cart']['total_count'] += $product['count'];
                $_SESSION['cart']['total_price'] += $product['count'] * $product['price'];

            }
        }
    }
}