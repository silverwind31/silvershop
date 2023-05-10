<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SectionSlider $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="section-slider-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'btn_link')->textInput(['maxlength' => true]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'btn_text')->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <label class="d-flex align-items-center flex-column mb-3 w-100">
                        <?php $image = \common\components\StaticFunctions::getImage($model->image,'section-slider',$model->id) ?>
                        <img src="<?=$image?>" alt="no photo" style="max-width: 100%; height: 200px">
                        <?= $form->field($model, 'image', ['options' => ['class' => 'mb-1']])->fileInput(['hidden'=>true, 'class'=>'preview'])->label(false)?>
                        <div class="btn btn-primary w-100">Upload the image</div>
                    </label>

                    <?= $form->field($model, 'status')->checkbox([
                        'data-plugin' => 'switchery',
                        'data-color' => '#98a6ad',
                        'data-size' => 'small'
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
