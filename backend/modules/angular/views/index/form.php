<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularFormAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'form';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularFormAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        Атрибуты которые могут использоватся для валидации в AngularJS:
        ng-model
        ng-change используется для определения выражения которое будет выполнятся когда контент элемента изменится
        ng-minlength устанавливает минимальное количество символов для того,
        чтобы данные введенные в элемент считались валидными
        ng-maxlength устанавливает максимальное количество символов для того,
        чтобы данные введенные в элемент считались валидными
        ng-pattern устанавливает регулярное выражение, соответствуя которому данные будут считатся валидными
        ng-required устанавливает обязательность введения данных для элемента
    </pre>
    <p>
        Обратите внимание что для элементов input, у которых атрибут type равен email, url, number
        не нужно указывать ng-pattern так как angular уже использует его для проверки на валидность содержимое элемента
    </p>
    <div id="tasksPanel" ng-controller="formCtrl">
        <form name="myForm" novalidate>
            <div class="panel panel-primary">
                <div class="panel panel-heading">
                    <div class="form-group">
                        <label class="h3">Text:</label>
                        <input name="sample" class="form-control" ng-model="inputValue" ng-required="requireValue"
                               ng-minlength="3" ng-maxlength="10" ng-pattern="matchPattern" />
                    </div>
                </div>
                <div class="panel-body">
                    <p>Required Error: {{myForm.sample.$error.required}}</p>
                    <p>Min Length Error: {{myForm.sample.$error.minlength}}</p>
                    <p>Max Length Error: {{myForm.sample.$error.maxlength}}</p>
                    <p>Pattern Error: {{myForm.sample.$error.pattern}}</p>
                    <p>Element Valid: {{myForm.sample.$valid}}</p>
                </div>
            </div>
        </form>
    </div>
    <div class="cb"></div>
    <br /><hr /><br />
    <pre>
        Атрибуты которые могут применятся к input  с типом checkbox:
        ng-model
        ng-change используется для определения выражения которое будет выполянтся когда контент элемента изменится
        ng-true-value определяет значение которое установится выражением привязки данных
        когда состояние элемента будет "выбран"
        ng-false-value определяет значение которое установится выражением привязки данных
        когда состояние элемента будет "не выбран"
    </pre>
    <div id="tasksPanel" class="panel" ng-controller="form2Ctrl">
        <form name="myForm" novalidate>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="checkbox">
                        <label>
                            <input name="sample" type="checkbox" ng-model="inputValue2" ng-true-value="1"
                                   ng-false-value="0" />
                            Checkbox
                        </label>
                    </div>
                </div>
                <div class="panel-body">
                    <p>Model Value:{{inputValue2}}</p>
                </div>
            </div>
        </form>
    </div>
    <div class="cb"></div>
    <br /><hr /><br />
    <div id="tasksPanel" class="panel" ng-controller="form3Ctrl">
        <form name="myForm" novalidate>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Validation info:</h3>
                    <p>Required Error: {{myForm.sample.$error.required}}</p>
                    <p>Min Length Error: {{myForm.sample.$error.minlength}}</p>
                    <p>Max Length Error: {{myForm.sample.$error.maxlength}}</p>
                    <p>Pattern Error: {{myForm.sample.$error.pattern}}</p>
                    <p>Element Valid: {{myForm.sample.$valid}}</p>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <textarea name="sample" cols="40" rows="3" ng-model="textValue" ng-required="requireValue"
                                  ng-minlength="3" ng-maxlength="10" ng-pattern="matchPattern"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="cb"></div>
    <br /><hr /><br />
    <p>
        ng-options="item.action for item in tasks" это выражение указывает
        сгенерировать элементы option для каждого элемента из tasks
        и отобразить содержимое свойства item.action
    </p>
    <div id="tasksPanel" class="panel" ng-controller="form4Ctrl">
        <form name="myForm" novalidate>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Selected: {{selectValue || 'None'}}</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Select an Action:</label>
                        <select ng-model="selectValue" ng-options="task.action for task in tasks">
                            <option value="">Select one</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="cb"></div>
    <br /><hr /><br />
    <p>
        используйте group by для для создания группировок элементов option
    </p>
    <div id="tasksPanel" class="panel" ng-controller="form5Ctrl">
        <form name="myForm" novalidate>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Selected: {{value || 'None'}}</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Select an Action:</label>
                        <select ng-model="value" ng-options="task.action group by task.priority for task in tasks">
                            <option value="">Select one</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>