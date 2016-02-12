<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularAjaxHttpAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ajax http';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularAjaxHttpAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <div ng-controller="ajaxHttpCtrl">
        <ng-include src="'loginPage.html'" ng-show="displayPage == 'loginPage'"></ng-include>
        <ng-include src="'createAccountPage.html'" ng-show="displayPage == 'createAccountPage'"></ng-include>
        <ng-include src="'privatePage.html'" ng-show="displayPage == 'privatePage'"></ng-include>
    </div>
</div>