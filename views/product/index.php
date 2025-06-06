<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Продукция';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новое поле "Продукция"', ['create'], ['class' => 'btn btn-success', 'style' => 'background: #355CBD; border:none']) ?>
    </p>




    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_product',
            [
                'attribute' => 'product_type_id',
                'value' => function($model) {
                    return $model->productType ? $model->productType->name : '—';
                },
                'label' => 'Тип продукта',
            ],

            ['attribute'=>'name',
                'label'=>'Название продукта',],

            ['attribute'=>'article',
                'label'=>'Артикул',],
            ['attribute'=>'min_price_partner',
                'label'=>'Минимальная цена для партнеров',], //РЕАЛИЗАЦИЯ РУСИФИЦИРОВАНИЯ СТОЛБЦОВ НА СТРАНИЦАХ ВЕБ ПРИЛОЖЕНИЯ
            [
                'attribute' => 'material_type_id',
                'value' => function($model) {
                    return $model->materialType ? $model->materialType->name : '—';
                },
                'label' => 'Тип материала',
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_product' => $model->id_product]);
                 }
            ],
        ],
    ]); ?>


</div>
