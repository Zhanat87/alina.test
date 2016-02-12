<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularAjaxWithoutRestAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ajax without rest';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularAjaxWithoutRestAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <div ng-controller="ajaxWithoutRestCtrl">
        <ng-include src="'partial/loginPage.html'" ng-show="displayPage == 'loginPage'"></ng-include>
        <ng-include src="'partial/createAccountPage.html'" ng-show="displayPage == 'createAccountPage'"></ng-include>
        <ng-include src="'partial/privatePage.html'" ng-show="displayPage == 'privatePage'"></ng-include>
    </div>
</div>