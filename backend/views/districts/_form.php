<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Districts $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="districts-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                </div>
            </div>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success w-20']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
