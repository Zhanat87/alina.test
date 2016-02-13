<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use frontend\assets\ContactAsset;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;

ContactAsset::register($this);
?>
<div class="site-contact">
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>
    <div class="row">
        <div class="panel col-xs-5" ng-controller="contactCtrl">
            <form name="contactForm" novalidate ng-submit="sendForm(contact)" ng-show="notYetSendEmail">
                <div class="well">
                    <div class="form-group">
                        <label>name:</label>
                        <input name="name" type="text" class="form-control nameInput" required ng-model="contact.name" />
                    </div>
                    <div class="form-group">
                        <label>email:</label>
                        <input name="email" type="email" class="form-control emailInput" required ng-model="contact.email" />
                    </div>
                    <div class="form-group">
                        <label>subject:</label>
                        <input name="subject" type="text" class="form-control subjectInput" required ng-model="contact.subject" />
                    </div>
                    <div class="form-group">
                        <label>body:</label>
                        <textarea name="body" class="form-control bodyTextarea" required ng-model="contact.body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" ng-disabled="contactForm.$invalid">
                        Submit
                    </button>
                </div>
            </form>
            <div class="alert alert-success" ng-hide="notYetSendEmail">
                message send success
            </div>
        </div>
    </div>
</div>