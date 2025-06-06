<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Workshop $model */

$this->title = 'Create Workshop';
$this->params['breadcrumbs'][] = ['label' => 'Workshops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
