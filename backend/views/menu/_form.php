<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Menu $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <?= $form->field($model, 'position')->dropDownList(Yii::$app->params['menu_positions'],[
                            'prompt'=>'Choose location'
                    ]) ?>

                    <?= $form->field($model, 'parent')->dropDownList($model->parentElements,[
                            'prompt'=> 'Choose position'
                    ]) ?>

                    <?= $form->field($model, 'order_by')->textInput() ?>

                    <?= $form->field($model, 'status')->textInput() ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
