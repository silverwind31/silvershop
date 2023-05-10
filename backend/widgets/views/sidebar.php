<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="/admin_assets/images/users/user.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
           <div class="username text-muted mt-1"><?=Yii::$app->user->identity->username?></div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li class="menu-title">Tables</li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['/menu'])?>">
                        <i class="fab fa-elementor"></i>
                        <span>Menus</span>
                    </a>
                </li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['/social-links'])?>">
                        <i class="fas fa-share-alt-square"></i>
                        <span>Social links</span>
                    </a>
                </li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['/user'])?>">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['/advantages'])?>">
                        <i class="fas fa-book-medical"></i>
                        <span>Advantages</span>
                    </a>
                </li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['/section-slider'])?>">
                        <i class="fas fa-sliders-h"></i>
                        <span>Slider</span>
                    </a>
                </li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['/brand'])?>">
                        <i class="far fa-copyright"></i>
                        <span>Brands</span>
                    </a>
                </li>

                <li>
                    <a href="<?=\yii\helpers\Url::to(['/districts'])?>">
                        <i class="fas fa-map"></i>
                        <span>Districts</span>
                    </a>
                </li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['/regions'])?>">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>Regions</span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarProducts" data-bs-toggle="collapse">
                        <i class="fas fa-cart-arrow-down"></i>
                        <span> Products </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProducts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="<?=\yii\helpers\Url::to(['/product'])?>"><i class="fas fa-shopping-cart"></i>Products</a>
                            </li>
                            <li>
                                <a href="<?=\yii\helpers\Url::to(['/product-categories'])?>"><i class="fas fa-luggage-cart"></i>Product categories</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
