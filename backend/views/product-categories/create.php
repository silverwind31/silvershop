<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ProductCategories $model */

$this->title = 'Create Product Categories';
$this->params['breadcrumbs'][] = ['label' => 'Product Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
