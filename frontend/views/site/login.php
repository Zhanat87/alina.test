<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\assets\LoginAsset;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

LoginAsset::register($this);
?>
<h1>
    <?= Html::encode($this->title) ?>
</h1>
<div class="row">
    <div class="panel col-xs-3" ng-controller="loginCtrl">
        <form name="loginForm" novalidate ng-submit="login(user)">
            <div class="well">
                <div class="form-group">
                    <label>Username:</label>
                    <input name="username" type="text" class="form-control usernameInput" required ng-model="user.username" />
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input name="password" type="password" class="form-control passwordInput" required ng-model="user.password" />
                </div>
                <div class="checkbox">
                    <label>
                        <input name="rememberMe" type="checkbox" ng-model="user.rememberMe" />
                        remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" ng-disabled="loginForm.$invalid">
                    Login
                </button>
            </div>
            <div class="well">
                Valid: {{loginForm.$valid}}
            </div>
        </form>
    </div>
    <div style="color:#999;margin:1em 0">
        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
    </div>
</div>