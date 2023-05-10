<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SocialLinks $model */

$this->title = 'Create Social Links';
$this->params['breadcrumbs'][] = ['label' => 'Social Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-links-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
