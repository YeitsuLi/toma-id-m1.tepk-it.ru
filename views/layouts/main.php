<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/comfort.ico')]); //замененная иконка на иконку по стилю
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        body, h1, h2, h3, h4, h5, h6, input, textarea, button {
            font-family: 'Candara', sans-serif!important;
            background-color: #FFFFFF;
        }
        .bg {
            background-color: #D2DFFF !important;
        }

    </style>

</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header" >
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/comfort.ico', ['alt' => 'Логотип', 'style' => 'height:30px;']) . ' ' . Yii::$app->name, //РЕАЛИЗАЦИЯ ЛОГОТИПА НА ХЕДЕРЕ ВЕБ ПРИЛОЖЕНИЯ
        'brandUrl' => Yii::$app->homeUrl,

        'options' => ['class' => 'navbar-expand-md navbar-white bg fixed-top'],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Продукция', 'url' => ['product/index']], //перемещение по вкладкам на веб приложении (заголовки в хедере)
            ['label' => 'Реализация цехов и продуктов', 'url' => ['product-workshop/index']],
            ['label' => 'Список цехов', 'url' => ['workshop/index']],
            Yii::$app->user->isGuest
                ? ['label' => '', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; Комфорт <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
