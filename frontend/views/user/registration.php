<?php

use yii\helpers\Url;




?>
<!-- Start of Main -->
<div class="login-page">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Registration</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb pt-3 pb-3">
                <li><a href="<?= Url::home()?>">Home</a></li>
                <li>Sign up</li>
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
                            <?=$form->field($model,'username')?>
                            <?=$form->field($model,'phone')?>

                            <?=$form->field($model,'password')->input('password')?>

                            <?=$form->field($model,'rePassword')->input('password')?>
                        </div>
                        <div class="card-footer py-3 d-flex flex-column gap-3">
                            <button type="submit" class="btn btn-success w-100">Sign up</button>

                            <p style="margin-bottom: 0">Already have an acoount? Please, <a href="<?= Url::to(['/user/login'])?>">Sign in.</a></p>
                        </div>
                    </div>
                    <?php \yii\bootstrap5\ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main -->