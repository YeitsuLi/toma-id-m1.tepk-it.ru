<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductWorkshop $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-workshop-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(
            \app\models\Product::find()->all(),
            'id_product', 'name'
        ),
        ['prompt' => 'Выберите тип']
    ) ?>

    <?= $form->field($model, 'workshop_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(
            \app\models\Workshop::find()->all(),
            'id_workshop', 'name'
        ),
        ['prompt' => 'Выберите тип']
    ) ?>

    <?= $form->field($model, 'time_craft')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
