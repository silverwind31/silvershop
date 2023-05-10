<section class="intro-section">
    <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
         data-swiper-options="{
                    'slidesPerView': 1,
                    'autoplay': {
                        'delay': 8000,
                        'disableOnInteraction': false
                    }
                }">
        <div class="swiper-wrapper">
            <?php if(!empty($models)): ?>

                <?php foreach ($models as $model): ?>
                    <?php $image = \common\components\StaticFunctions::getImage($model->image,'section-slider',$model->id) ?>
                    <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                 style="background-image: url(/images/demos/demo1/sliders/slide-1.jpg); background-color: #ebeef2;">
                <div class="container">
                    <figure class="slide-image skrollable slide-animate">
                        <img src="<?=$image?>" alt="Banner"
                             data-bottom-top="transform: translateY(10vh);"
                             data-top-bottom="transform: translateY(-10vh);" width="474" height="397">
                    </figure>
                    <div class="banner-content y-50 text-right">
                        <h3 class="banner-title font-weight-bolder ls-25 lh-1 slide-animate mb-1"
                            data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.4s'
                                }">
                           <?=$model->title ?>
                        </h3>
                        <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate mb-1"
                            data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.2s'
                                }">
                            <span><?=$model->description?></span>
                        </h5>
                        <a href="<?=$model->btn_link?>"
                           class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                           data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.8s'
                                }"><?=$model->btn_text?><i class="w-icon-long-arrow-right"></i></a>

                    </div>
                    <!-- End of .banner-content -->
                </div>
                <!-- End of .container -->
            </div>
                <?php  endforeach;?>
            <?php endif; ?>
        </div>
        <div class="swiper-pagination"></div>
        <button class="swiper-button-next"></button>
        <button class="swiper-button-prev"></button>
    </div>
    <!-- End of .swiper-container -->
</section>
<!-- End of .intro-section -->