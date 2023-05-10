<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SocialLinks $model */

$this->title = 'Update Social Links: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Social Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="social-links-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
