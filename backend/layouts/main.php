<?php

use backend\assets\AppAsset;
use backend\assets\IE9Asset;
use backend\assets\DatePickerAsset;
use yii\helpers\Html;
use backend\widgets\Header;
use backend\widgets\Footer;
use backend\widgets\Sidebar;
use backend\widgets\BreadCrumbs;
use common\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
DatePickerAsset::register($this);
IE9Asset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language; ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <?php echo Html::csrfMetaTags(); ?>
    <title>
        <?php echo Html::encode(Yii::$app->id . '::' . $this->title); ?>
    </title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
        <div id="theme-wrapper">
            <?php echo Header::widget(); ?>
            <div id="page-wrapper" class="container">
                <div class="row">
                    <?php echo Sidebar::widget(); ?>
                    <div id="content-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo BreadCrumbs::widget(); ?>
                                <div class="row">
                                    <?php echo Alert::widget(); ?>
                                </div>
                                <div class="row">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </div>
                        <?php echo Footer::widget(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-loading-bg"></div>
        <div class="modal-loading"></div>
        <div class="requestUrl hide"><?php echo Yii::$app->request->url; ?></div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>