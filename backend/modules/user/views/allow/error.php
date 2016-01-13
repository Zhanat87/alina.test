<?php

use backend\assets\ErrorAsset;
use backend\assets\IE9Asset;
use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */
ErrorAsset::register($this);
IE9Asset::register($this);

$this->context->layout = false;
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
            <?php echo Html::encode(Yii::$app->id . ' :: ' . $exception->statusCode); ?> Ошибка
        </title>
        <?php $this->head() ?>
    </head>
    <body id="error-page">
    <?php $this->beginBody() ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div id="error-box">
                    <div class="row">
                        <div class="col-xs-12">
                            <div id="error-box-inner">
                                <?php if ($exception->statusCode == 404) : ?>
                                    <img src="/centaurus/img/error-404-v3.png" alt="Have you seen this page?"/>
                                <?php else : ?>
                                    <img src="/centaurus/img/error-500-v1.png" alt="Error 500"/>
                                <?php endif; ?>
                            </div>
                            <h1>
                                Ошибка <?php echo Html::encode($exception->statusCode); ?>
                            </h1>
                            <h4>
                                <?php echo Html::encode($message); ?>
                            </h4>
                            <?php if ($exception->statusCode == 404) : ?>
                                <p>
                                    Извините, но страница, которую вы ищете не может быть найдена.
                                    <br />
                                    Попробуйте проверить URL на наличие ошибок
                                    <a href="/">
                                        или вернуться на главную страницу
                                    </a>
                                </p>
                            <?php else : ?>
                                <p>
                                    Что-то пошло не так. Не волнуйтесь! Мы работаем над этим.
                                </p>
                                <p>
                                    <?php echo $exception->getMessage(); ?>
                                </p>
                                <div class="btn-group">
                                    <a href="<?php echo Yii::$app->session->get('returnUrl'); ?>" class="btn btn-danger">
                                        <i class="fa fa-chevron-left"></i>
                                        Вернуться назад
                                    </a>
                                    <a href="/" class="btn btn-default">
                                        Главная
                                    </a>
                                </div>
                            <?php endif; ?>
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