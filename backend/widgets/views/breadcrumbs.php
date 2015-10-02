<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- BREADCRUMBS -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <?php if (Yii::$app->request->url != '/') : ?>
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo Yii::$app->homeUrl; ?>">
                        Главная
                    </a>
                </li>
            <?php endif; ?>
            <?php if (isset($this->params['breadcrumbs'])) : ?>
                <?php foreach ($this->params['breadcrumbs'] as $breadcrumb) : ?>
                    <li>
                        <?php if (isset($breadcrumb['url'])) : ?>
                            <a href="<?php echo Url::to($breadcrumb['url']); ?>">
                                <?php echo Html::encode($breadcrumb['label']); ?>
                            </a>
                        <?php else : ?>
                            <span>
                                <?php echo Html::encode($breadcrumb); ?>
                            </span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li class="active">
                    <span>
                        <?php echo Html::encode($this->title); ?>
                    </span>
                </li>
            <?php endif; ?>
        </ol>
    </div>
</div>
<!-- /BREADCRUMBS -->