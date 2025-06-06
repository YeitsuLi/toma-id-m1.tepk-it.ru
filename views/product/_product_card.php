<?php
use yii\helpers\Html;
/* @var $model \app\models\Product */
/* @var $model \app\models\ProductType */


?>
<div class="card h-100">
    <div class="card-body position-relative">
        <!-- Блок стоимости в правом верхнем углу
        <div class="position-absolute top-0 end-0 p-3">
            <?= $sum = 0.00;
        $sum .= number_format($model->FuncController(), 2, '.', ' ') ?> ₽
        </div>-->
        <!-- Время изготовления -->
        <div class="position-absolute top-0 end-0 p-3">
            Время изготовления (ч): <?= Html::encode($model->FuncController()) ?>
        </div>
        <div class="d-flex flex-column">
            <h5 class="card-title mb-1">
                <?= Html::encode($model->name ?? 'Название не указано') ?>
            </h5>
            <div class="text-muted small mb-1">
                Артикул: <?= Html::encode($model->article ?? 'Артикул не указан') ?>
            </div>
            <div class="mb-1">
                Минимальная стоимость для партнера: <?= Html::encode($model->min_price ?? 'Минимальная стоимость не указана') ?>
            </div>
            <div class="mb-1">
                ID Типа материала: <?= Html::encode($model->material_type_id ?? 'Тип не указан') ?>
            </div>
        </div>
            <?= Html::a('Просмотр', ['view', 'id_product' => $model->id_product], ['class' => 'btn btn-sm btn-outline-primary']) ?>
    </div>
</div>
