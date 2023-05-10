<?php

use common\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-body">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                [
                    'contentOptions'=>['class'=>'v-align-middle'],
                    'content'=> function($model){
                        return '<input class="form-check remove_check" type="checkbox" name="' . $model->id . '" ">';
                    }
                ],

            ['class' => 'yii\grid\SerialColumn'],

//                        'id',
            'name',
            'category_id',
            'brand_id',
            'new_price',
//            'old_price',
            //'new',
            //'top',
            //'sale',
            [
                'attribute'=>'image',
                'value'=>function($data){
                    $image = \common\components\StaticFunctions::getImage($data->image,'product',$data->id);
                    return "<img src='$image' style='max-width: 150px' alt='<?=$data->image?>'>";
                },
                'format'=>"html"
            ],
            //'created_date',
            //'updated_date',
            //'status',
            [

            'class' => 'yii\grid\ActionColumn',

            'header' => 'Actions',

            'template' => '{buttons}',

            'buttons' => [

            'buttons' => function ($url, $model) {

            $controller = Yii::$app->controller->id;

            $code = <<<BUTTONS

            <div class="d-flex align-items-center gap-1 justify-content-center">

                <a href="/{$controller}/view?id={$model->id}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                <a href="/{$controller}/update?id={$model->id}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                <a href="/{$controller}/delete?id={$model->id}" class="btn btn-danger delete"><i class="fas fa-trash"></i></a>

            </div>

            BUTTONS;

            return $code;

            }



            ],

            ],
            ],
            ]); ?>
        
            </div>
    <div class="card-footer">
        <?php \yii\bootstrap5\ActiveForm::begin() ?>
        <input type="hidden" name="deleted_ids" id="deleted_ids">
            <button class="btn btn-danger">Delete</button>
        <?php \yii\bootstrap5\ActiveForm::end() ?>
    </div>
</div>
