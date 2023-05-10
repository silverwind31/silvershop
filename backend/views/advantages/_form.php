<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Advantages $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="advantages-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($model, 'order_by')->textInput() ?>

                    <?= $form->field($model, 'status')->checkbox([
                        'data-plugin' => 'switchery',
                        'data-color' => '#98a6ad',
                        'data-size' => 'small'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
