<?php

use backend\assets\LoginAsset;
use backend\assets\IE9Asset;
use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 */
LoginAsset::register($this);
IE9Asset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1,
    user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?php
        echo Html::encode(Yii::$app->id . ' :: ' . $this->title);
        ?>
    </title>
    <?php $this->head() ?>
</head>
<body id="login-page-full">
<?php $this->beginBody() ?>
<div id="login-full-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div id="login-box">
                    <div id="login-box-holder">
                        <div class="row">
                            <div class="col-xs-12">
                                <header id="login-header">
                                    <div id="login-logo">
                                        <h4>
                                            Имя приложения
                                        </h4>
                                    </div>
                                </header>
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>