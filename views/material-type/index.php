<?php

use app\models\MaterialType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MaterialTypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Material Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Material Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_material_type',
            'name',
            'percent_loss_material',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MaterialType $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_material_type' => $model->id_material_type]);
                 }
            ],
        ],
    ]); ?>


</div>
