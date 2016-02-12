<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularAjaxUsingResourceAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ajax using resource';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularAjaxUsingResourceAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <div class="panel panel-primary" ng-controller="ajaxUsingResourceCtrl">
        <ng-include src="'tableView.html'" ng-show="displayMode == 'list'" ></ng-include>
        <ng-include src="'editorView.html'" ng-show="displayMode == 'edit'"></ng-include>
    </div>
</div>