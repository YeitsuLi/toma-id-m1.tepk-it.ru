<?php
use yii\helpers\Html;
/* @var $model \app\models\Product */
?>
<div class="card h-100">
    <div class="card-body position-relative">

        <div class="position-absolute top-0 end-0 p-3">
            <?= number_format($model->FuncController(), 2, '.', ' ') ?> ₽
        </div>

        <div class="d-flex flex-column">

            <h5 class="card-title mb-1">
                <?= Html::encode($model->name) ?>
            </h5>

            <div class="text-muted small mb-1">
                <?= Html::encode($model->article ?? 'Артикль не указан') ?>
            </div>

            <div class="text-muted small mb-1">
                <?= Html::encode($model->min_price_partner ?? 'Минимальная цена для партнера не указана') ?>
            </div>

            <div class="text-muted small mb-1">
                Время изготовления: <?= Html::encode($model->FuncController()) ?>
            </div>
        </div>

        <div class="mt-3 text-end">
            <?= Html::a('Просмотр', ['view', 'id_product' => $model->id_product], ['class' => 'btn btn-sm btn-outline-primary']) ?>
        </div>
    </div>
</div>
