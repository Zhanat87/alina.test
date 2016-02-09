<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularNgAttributesAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'ng-attributes';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularNgAttributesAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        когда мы хотим использовать disable для элемента в зависимости от условия,
        то мы этого не можем сделать так как функционал этого атрибуте это не предусматривает
        для этого в AngularJS предусмотрены специальные директивы, которые могут применятся
        в зависимости от условия, эти директивы применимы только как атрибуты:
        ng-checked используется для установки значения выбран\не выбран для input
        ng-disabled используется для disable элемента применяется для input и button
        ng-readonly используется для атрибута readonly применяется к input
        ng-selected используется для атрибута selected в option
        ng-href используется для указания url в href
        ng-src используется для указания физического пути
    </pre>
    <div id="tasksPanel" class="panel well" ng-controller="ngAttributesCtrl">
        <h3 class="panel-header">Attributes</h3>
        <div class="checkbox">
            <label>
                <input type="checkbox" ng-model="dataValue" />
                Apply attributes
            </label>
        </div>
        <div>
            <div class="form-group">
                <button class="btn btn-success" ng-disabled="dataValue">ng-disabled</button>
            </div>
            <div class="form-group">
                <label >
                    ng-readonly
                    <input class="form-control" value="Readonly" ng-readonly="dataValue" />
                </label>
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" ng-checked="dataValue" />
                    ng-checked
                </label>
            </div>
            <div class="form-group">
                <label>
                    <input type="radio" ng-checked="dataValue" />
                    ng-checked
                </label>
            </div>
            <div class="form-group">
                <label>
                    ng-select
                    <select class="form-control">
                        <option value="value">text 1</option>
                        <option value="value" ng-selected="dataValue">ng-selected</option>
                    </select>
                </label>

            </div>
        </div>
    </div>
</div>