<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
<!--Auth fluid left content -->
<div class="auth-fluid-form-box">
    <div class="align-items-center d-flex h-100">
        <div class="p-3 w-100">
            <div class="auth-brand text-center text-lg-start">
                <div class="auth-logo">
                    <div class="logo logo-dark text-center">
                            <span class="logo-lg">
                                <img src="/admin_assets/images/logo-dark.png" alt="" height="22">
                            </span>
                    </div>
                    <div class="logo logo-light text-center">
                            <span class="logo-lg">
                                <img src="/admin_assets/images/logo-light.png" alt="" height="22">
                            </span>
                    </div>
                </div>
            </div>
            <h1><?= Html::encode($this->title) ?></h1>
            <h4 class="text-muted mb-4">Please fill out the following fields to login:</h4>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<div class="auth-fluid-right text-center">
    <div class="auth-user-testimonial">
        <h2 class="mb-3 text-white">Welcome to <strong>UBOLD</strong> admin panel!</h2>
        <p class="lead"><i class="mdi mdi-format-quote-open"></i> I've been using your theme from the previous developer for our web app, once I knew new version is out, I immediately bought with no hesitation. Great themes, good documentation with lots of customization available and sample app that really fit our need. <i class="mdi mdi-format-quote-close"></i>
        </p>
        <h5 class="text-white">
            - Fadlisaad (Ubold Admin User)
        </h5>
    </div>
</div>

