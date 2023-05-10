<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SectionSlider $model */

$this->title = 'Create slide';
$this->params['breadcrumbs'][] = ['label' => 'Section Slider', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-slider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
