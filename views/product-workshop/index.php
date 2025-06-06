<?php

use app\models\ProductWorkshop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshopSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Реализация цехов и продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-workshop-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новое поле "Реализация цехов и продуктов"', ['create'], ['class' => 'btn btn-success', 'style' => 'background: #355CBD; border:none']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_product_workshop',
            [
                'attribute' => 'product_id',
                'value' => function($model) {
                    return $model->product ? $model->product->name : '—';
                },
                'label' => 'Продукт',
            ],

            [
                'attribute' => 'workshop_id',
                'value' => function($model) {
                    return $model->workshop ? $model->workshop->name : '—';
                },
                'label' => 'Цех',
            ],

            ['attribute'=>'time_craft',
                'label'=>'Время производства (в часах)',],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductWorkshop $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_product_workshop' => $model->id_product_workshop]);
                 }
            ],
        ],
    ]); ?>


</div>
