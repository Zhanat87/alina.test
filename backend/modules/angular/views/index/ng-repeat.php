<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\AngularAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ng-repeat';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <div class="booksRepeatDiv" ng-controller="booksRepeatCtrl" url="<?php echo Url::to('/angular/index/ng-repeat'); ?>">
        <table class="table table-hover table-responsive">
            <tr>
                <td>ID</td>
                <td>name</td>
                <td>author</td>
                <td>publish date</td>
            </tr>
            <tbody ng-repeat="book in books">
                <tr>
                    <td>{{book.id}}</td>
                    <td>{{book.name}}</td>
                    <td>{{book.author_id}}</td>
                    <td>{{book.publish_date}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>