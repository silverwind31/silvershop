<?php

use common\models\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\MenuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="card-body">
                                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
                    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//                        'id',
            'title',
            'link',
            [
                'attribute'=>'position',
                'value'=> function($data){
                    return Yii::$app->params['menu_positions'][$data->position];
                }
            ],
//            'order_by',
            [
                'attribute'=>'parent',
                'value'=> function($data){
                     return (!empty(Menu::findOne($data->parent))) ? Menu::findOne($data->parent)->title : 'First element';
                }
            ],
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

    </div>
</div>
