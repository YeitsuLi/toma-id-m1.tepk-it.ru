<?php

use app\models\Workshop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\WorkshopSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Список цехов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новое поле "Цех"', ['create'], ['class' => 'btn btn-success', 'style' => 'background: #355CBD; border:none']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_workshop',
            'name',
            'workshop_type_id',
            'count_people',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Workshop $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_workshop' => $model->id_workshop]);
                 }
            ],
        ],
    ]); ?>


</div>
