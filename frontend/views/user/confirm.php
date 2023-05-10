<!-- Start of Main -->
<div class="login-page">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Confirm</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb pt-3 pb-3">
                <li><a href="<?=\yii\helpers\Url::home()?>">Home</a></li>
                <li><a href="<?=\yii\helpers\Url::to(['/user/registration'])?>">Sign up</a></li>
                <li>Confirm</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php $form = \yii\bootstrap5\ActiveForm::begin([
                        'enableAjaxValidation' => true
                    ]) ?>
                    <div class="card">
                        <div class="card-body">
                            <?=$form->field($model,'phone')->hiddenInput(['value'=>$user->phone])->label(false)?>

                            <?=$form->field($model,'smsCode')?>
                        </div>
                        <div class="card-footer py-3 d-flex flex-column gap-2">
                            <button type="submit" class="btn btn-success w-100">Confirm</button>
                        </div>
                    </div>
                    <?php \yii\bootstrap5\ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main -->

