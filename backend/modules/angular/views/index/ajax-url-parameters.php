<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularAjaxUrlParametersAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ajax url parameters';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularAjaxUrlParametersAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <div class="panel panel-primary" ng-controller="ajaxUrlParametersCtrl">
        <div ng-view></div>
    </div>
</div>