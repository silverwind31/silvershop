<!-- Start of Page Header -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title mb-0">My Account</h1>
    </div>
</div>
<!-- End of Page Header -->

<!-- Start of Breadcrumb -->
<nav class="breadcrumb-nav ">
    <div class="container ">
        <ul class="breadcrumb py-4">
            <li><a href="<?=\yii\helpers\Url::home()?>">Home</a></li>
            <li>My account</li>
        </ul>
    </div>
</nav>
<!-- End of Breadcrumb -->

<!-- Start of PageContent -->
<div class="page-content py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?=\frontend\widgets\ProfileSidebar::widget()?>
            </div>
            <div class="col-md-9">
                <div class="tab-pane">
                    <p class="greeting" style="font-size: 18px">
                        Hello
                        <span class="text-dark font-weight-bold"><?=$user->username?></span>
                        (not
                        <span class="text-dark font-weight-bold"><?=$user->username?></span>?
                        <a href="<?=\yii\helpers\Url::to(['/user/logout'])?>" class="text-primary">Log out</a>)
                    </p>

                    <p class="mb-4" style="font-size: 16px">
                       Welcome to your account!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>