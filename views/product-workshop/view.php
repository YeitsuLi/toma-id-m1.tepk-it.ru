<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshop $model */

$this->title = $model->id_product_workshop;
$this->params['breadcrumbs'][] = ['label' => 'Product Workshops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-workshop-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_product_workshop' => $model->id_product_workshop], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_product_workshop' => $model->id_product_workshop], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_product_workshop',
            'product_id',
            'workshop_id',
            'time_craft',
        ],
    ]) ?>

</div>
