$(document).ready(function (e) {
    $('.add_to_cart').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('productid');
        $.ajax({
            url: '/product/add-to-cart',
            data: {id:id},
            method: 'get',
            success: function (data) {
                let productData = JSON.parse(data)
                updateProductCount();
                // console.log(productData);
            },
            error: function () {

            }
        })
    });
    // $('.add_to_wishlist').on('click', function (e) {
    //     e.preventDefault();
    //     let id = $(this).data('id');
    //     console.log(id);
    //     $.ajax({
    //         url: '/user/add-to-wishlist',
    //         data: {id:id},
    //         method: 'get',
    //         success: function (data) {
    //             iziToast.show({
    //                 message: 'Successfully added to wishlist!',
    //                 position: 'bottomLeft',
    //             });
    //         },
    //         error: function () {
    //
    //         }
    //     })
    // })
    //SHOW CART
    $('.cart-toggle').on('click', function (e) {
        e.preventDefault();
        $('.cart-dropdown').addClass('opened');

        $.ajax({
            url: '/product/cart',
            method: 'get',
            success: function (data) {
                $('.products_cart_inner').html(data)
            },
            error: function (data) {
                alert('error!');
            }
        })
    });
    function updateProductCount() {
        $.ajax({
            url:'/product/total-count',
            method: 'get',
            success: function (data) {
                $('.cart-count').text(data);
            }
        })
    };
    $('.products_cart_inner').on('click', '.close_btn', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: '/product/delete-item',
            method: 'get',
            data: {id:id},
            success: function () {

            },
            error: function () {
                alert('error!');
            }
        })
    });
    $('.brands_filter input').on('change', function (e) {
        $('.brands_filter').submit();
    });
    $('.sort').on('change', function (e) {
        $('.sort_form').submit();
    })
})