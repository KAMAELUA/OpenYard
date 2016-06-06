<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'OpenYard',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '<span class="glyphicon glyphicon-home"></span> Home', 'encode' => false, 'url' => ['/site/index']],
        ['label' => '<span class="glyphicon glyphicon-info-sign"></span> About', 'encode' => false, 'url' => ['/site/about']],
        ['label' => '<span class="glyphicon glyphicon-phone-alt"></span> Contact', 'encode' => false, 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => '<span class="glyphicon glyphicon-user"></span> Signup', 'encode' => false, 'url' => ['/site/signup']];
        $menuItems[] = ['label' => '<span class="glyphicon glyphicon-log-in"></span> Login', 'encode' => false, 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

<div class="wide jumbotron">
        <h1 id="jt_h1">OpenYard</h1>

        <p id="jt_p" class="lead">Promote, manage, and host successful events.</p>

        <p><a class="btn btn-lg btn-default" href="<?= Url::to(['site/login']); ?>">Get started</a></p>
    </div>
    <div class="container" style="padding-top:40px;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    
    <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
</div>



<?php $this->endBody() ?>
<script>
/**
 * Listen to scroll to change header opacity class
 */
$('.navbar').css('background-color', 'rgba(34, 34, 34, 0');
$('.navbar').css('border-color', 'rgba(8, 8, 8, 0');
$('.navbar-nav > .active > a').css('background-color', 'rgba(34, 34, 34, 0');

$(document).on('scroll', function (e) {
    $('.navbar').css('background-color', 'rgba(34, 34, 34, '+($(document).scrollTop() / 300));
});
$(document).on('scroll', function (e) {
    $('.navbar-nav > .active > a').css('background-color', 'rgba(34, 34, 34, '+($(document).scrollTop() / 300));
});
$(document).on('scroll', function (e) {
    $('.navbar').css('border-color', 'rgba(8, 8, 8, '+($(document).scrollTop() / 300));
});
</script> 
</body>
</html>
<?php $this->endPage() ?>
