<?php

use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'new_price')->textInput() ?>

                        <?= $form->field($model, 'old_price')->textInput() ?>

                        <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                            'options' => ['rows' => 6],
                            'preset' => 'extended'
                        ]) ?>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <label class="d-flex align-items-center flex-column mb-3 w-100">
                        <?php $image = \common\components\StaticFunctions::getImage($model->image,'product',$model->id) ?>
                        <img src="<?=$image?>" alt="no photo" style="max-width: 100%; height: 200px">
                        <?= $form->field($model, 'image', ['options' => ['class' => 'mb-0']])->fileInput(['hidden'=>true, 'class'=>'preview'])->label(false)?>
                        <div class="btn btn-primary w-100">Upload the image</div>
                    </label>
                    <?= $form->field($model, 'category_id')->dropDownList($model->getProductCategories(),[
                            'prompt' => 'Choose category'
                    ]) ?>

                    <?= $form->field($model, 'brand_id')->dropDownList($model->allBrands,[
                            'prompt' => 'Choose Brand'
                    ]) ?>
                    <div class="d-flex align-items-center gap-4">
                        <?= $form->field($model, 'new')->checkbox([
                            'data-plugin' => 'switchery',
                            'data-color' => '#98a6ad',
                            'data-size' => 'small'
                        ]) ?>
                        <?= $form->field($model, 'top')->checkbox([
                            'data-plugin' => 'switchery',
                            'data-color' => '#98a6ad',
                            'data-size' => 'small'
                        ]) ?>
                    </div>
                    <div class="d-flex align-items-center gap-4">
                        <?= $form->field($model, 'sale')->checkbox([
                            'data-plugin' => 'switchery',
                            'data-color' => '#98a6ad',
                            'data-size' => 'small'
                        ]) ?>
                        <?= $form->field($model, 'status')->checkbox([
                            'data-plugin' => 'switchery',
                            'data-color' => '#98a6ad',
                            'data-size' => 'small'
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?=$form->field($model, 'galleryImages')->widget(FileInput::classname(), [
                        'options' => [
                            'accept' => 'image/*',
                            'multiple' => true
                        ],
                        'pluginOptions' => [
                            'showPreview' => true,
                            'initialPreview'=> $model->getGalleryPreview(),
                            'initialPreviewAsData'=> true,
                            'initialPreviewConfig' => $model->getGalleryConfig(),
                            'showCaption' => true,
                            'showRemove' => false,
                            'showUpload' => false
                        ],
                    ]);?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-body">
                    <?php DynamicFormWidget::begin([
                        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                        'widgetBody' => '.container-items', // required: css class selector
                        'widgetItem' => '.item', // required: css class
                        'limit' => 8, // the maximum times, an element can be cloned (default 999)
                        'min' => 1, // 0 or 1 (default 1)
                        'insertButton' => '.add-item', // css class
                        'deleteButton' => '.remove-item', // css class
                        'model' => $productChars[0],
                        'formId' => 'w0',
                        'formFields' => [
                            'name',
                            'value',
                        ],
                    ]); ?>

                    <div class="container-items"><!-- widgetContainer -->
                        <?php foreach ($productChars as $i => $productChar): ?>
                            <div class="item panel panel-default"><!-- widgetBody -->
                                <div class="panel-heading">
                                    <h3 class="panel-title pull-left">Specifies</h3>
                                    <div class="pull-right mb-2">
                                        <button type="button" class="add-item btn btn-success btn-xs"><i class="fas fa-plus"></i></button>
                                        <button type="button" class="remove-item btn btn-danger btn-xs"><i class="fas fa-minus"></i></button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    // necessary for update action.
                                    if (! $productChar->isNewRecord) {
                                        echo Html::activeHiddenInput($productChar, "[{$i}]id");
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?= $form->field($productChar, "[{$i}]name")->textInput(['maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <?= $form->field($productChar, "[{$i}]value")->textInput(['maxlength' => true]) ?>
                                        </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php DynamicFormWidget::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
