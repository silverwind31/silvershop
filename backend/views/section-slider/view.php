<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\SectionSlider $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Section Slider', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="section-slider-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex align-items-center mb-3 gap-2">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description',
            'image',
            'btn_link',
            'btn_text',
            'created_date',
            'status',
        ],
    ]) ?>

</div>
