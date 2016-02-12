<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularAjaxServicesForViewsAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ajax services for views';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularAjaxServicesForViewsAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <div class="panel panel-primary" ng-controller="ajaxServicesForViewsCtrl">
        <div ng-view></div>
    </div>
</div>