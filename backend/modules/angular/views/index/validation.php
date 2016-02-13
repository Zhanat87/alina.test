<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularValidationAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'validation';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularValidationAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <pre>
        существует несколько переменных валидации в angular:
        $pristine - возвращает true если пользователь не взаимодействовал с элементами формы
        $dirty - возвращает true если пользователь взаимодействовал с элементами формы
        $valid - возвращает true если форма валидна
        $invalid - возвращает true если форма невалидна
        $error - содержит информацию об ошибках валидации
    </pre>
    <p>
        атрибут name нужно указывать, так как далее он будет использоваться angular
        при проверке формы на валидность, это так же касается элементов формы
        так же здесь указан атрибут novalidate для того,
        чтобы браузеры не пытались сами валидировать данные и предоставили это angular
    </p>
    <p>
        так же в примере для проверки валидности используются стандартные возможности HTML:
        атрибуты и встроенная валидация по type,
        например required указывает на обязательность значения,
        а type="email" будет проверять на валидность данные с помощью регулярного выражения
    </p>
    <p>
        здесь используется директива ng-disabled для того, чтобы задавать
        состояние кнопки в случае не валидности данных в форме.
        обратите внимание, что переменную $invalid получаем на myForm,
        вот почему так важно задавать атрибут name как для форм, так и для элементов формы
    </p>
    <div id="todoPanel" class="panel col-xs-3" ng-controller="validationCtrl">
        <form name="myForm" novalidate ng-submit="addNewUser(newUser)">
            <div class="well">
                <div class="form-group">
                    <label>Name:</label>
                    <input name="userName" type="text" class="form-control" required ng-model="newUser.name">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="userEmail" type="email" class="form-control" required ng-model="newUser.email">
                </div>
                <div class="checkbox">
                    <label>
                        <input name="agreed" type="checkbox" ng-model="newUser.agreed" required>
                        I agree to the terms and conditions
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" ng-disabled="myForm.$invalid">
                    OK
                </button>
            </div>
            <div class="well">
                Message: {{message}}
                <div>
                    Valid: {{myForm.$valid}}
                </div>
            </div>
        </form>
    </div>
    <div class="cb"></div>
    <br />
    <hr />
    <br />
    <pre>
        для визуального указания пользователь на места где он совершил ошибки в angular существует ряд css классов:
        ng-pristine в этот класс добавляются все элементы с которыми пользователь еще не взаимодействовал
        ng-dirty в этот класс добавляются все элементы с которыми пользователь взаимодействовал
        ng-valid класс для валидных элементов
        ng-invalid класс для невалидных элементов
    </pre>
    <style>
        /*изначально когда страница только загрузилась к элементам не применяется никакой стиль
        так как они относятся к классу ng-pristine для которого стили не заданы*/
        form .ng-invalid.ng-dirty {
            background-color: lightpink;
        }
        form .ng-valid.ng-dirty {
            background-color: lightgreen;
        }
        /*первые два стиля применяются к элементам, в которые пользователь внес изменения,
        валидация производится angular после каждого действия пользователя (после каждого введенного символа)*/
        span.summary.ng-invalid {
            color: red;
            font-weight: bold;
        }
        span.summary.ng-valid {
            color: green;
        }
        /*эти два стиля применяются к блоку summary в зависимости от того валидны ли данные в форме или нет*/
    </style>
    <p>
        так же можно используя переменные валидации angular самостоятельно применять
        те или инные стили при соблюдении валидности\невалидности
    </p>
    <div id="todoPanel" class="panel col-xs-3" ng-controller="validation2Ctrl">
        <form name="myForm" novalidate ng-submit="addNewUser(newUser)">
            <div class="well">
                <div class="form-group">
                    <label>Name:</label>
                    <input name="userName" type="text" class="form-control" required ng-model="newUser.name">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="userEmail" type="email" class="form-control" required ng-model="newUser.email">
                </div>
                <div class="checkbox">
                    <label>
                        <input name="agreed" type="checkbox" ng-model="newUser.agreed" required>
                        I agree to the terms and conditions
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" ng-disabled="myForm.$invalid">
                    OK
                </button>
            </div>
            <div class="well">
                Message: {{message}}
                <div>
                    Valid:
                    <span class="summary" ng-class="myForm.$valid ? 'ng-valid' : 'ng-invalid'">
                        {{myForm.$valid}}
                    </span>
                </div>
            </div>
        </form>
    </div>
    <br />
    <hr />
    <br />
    <div class="cb"></div>
    <style>
        /*angular так же позволяет применять стили в зависимости от того какое ограничение на валидность срабатывает
        ниже приведено 2 стиля: 1й срабатывает если мы сделали поле dirty 2й когда email не прошел валидность*/
        form .ng-invalid-required.ng-dirty {
            background-color: lightpink;
        }
        form .ng-invalid-email.ng-dirty {
            background-color: lightgoldenrodyellow;
        }
    </style>
    <div id="todoPanel" class="panel col-xs-3" ng-controller="validation3Ctrl">
        <form name="myForm" novalidate ng-submit="addNewUser(newUser)">
            <div class="well">
                <div class="form-group">
                    <label>Name:</label>
                    <input name="userName" type="text" class="form-control" required ng-model="newUser.name">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="userEmail" type="email" class="form-control" required ng-model="newUser.email">
                </div>
                <div class="checkbox">
                    <label>
                        <input name="agreed" type="checkbox" ng-model="newUser.agreed" required>
                        I agree to the terms and conditions
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" ng-disabled="myForm.$invalid">
                    OK
                </button>
            </div>
            <div class="well">
                Message: {{message}}
                <div>
                    Valid:
                    <span class="summary" ng-class="myForm.$valid ? 'ng-valid' : 'ng-invalid'">
                        {{myForm.$valid}}
                    </span>
                </div>
            </div>
        </form>
    </div>
    <br />
    <hr />
    <br />
    <div class="cb"></div>
    <style>
        /*angular так же позволяет применять стили в зависимости от того какое ограничение на валидность срабатывает
        ниже приведено 2 стиля: 1й срабатывает если мы сделали поле dirty 2й когда email не прошел валидность*/
        form .ng-invalid-required.ng-dirty {
            background-color: lightpink;
        }
        form .ng-invalid-email.ng-dirty {
            background-color: lightgoldenrodyellow;
        }
    </style>
    <p>
        myForm.userEmail.$invalid && myForm.userEmail.$dirty такое условие необходимо потому,
        что если элемент pristine и required,
        то для него сразу будет отображатся сообщение о невалидности,
        что может сбить с толку пользователя, который еще ничего даже и не вводил,
        поэтому сообщения применятся только если у элемента присутствует класс dirty
    </p>
    <p>
        здесь добавлен div, в котором содержатся 2 сообщения в зависимости от типа ошибки валидации
        с помощью директивы ng-show будет показано сообщение с причиной не валидности введенных данных
    </p>
    <div id="todoPanel" class="panel col-xs-3" ng-controller="validation4Ctrl">
        <form name="myForm" novalidate ng-submit="addNewUser(newUser)">
            <div class="well">
                <div class="form-group">
                    <label>Name:</label>
                    <input name="userName" type="text" class="form-control" required ng-model="newUser.name">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="userEmail" type="email" class="form-control" required ng-model="newUser.email">
                    <div class="error" ng-show="myForm.userEmail.$invalid && myForm.userEmail.$dirty">
                        <span ng-show="myForm.userEmail.$error.email">
                            Please enter a valid email address
                        </span>
                        <span ng-show="myForm.userEmail.$error.required">
                            Please enter a value
                        </span>
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input name="agreed" type="checkbox" ng-model="newUser.agreed" required>
                        I agree to the terms and conditions
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" ng-disabled="myForm.$invalid">
                    OK
                </button>
            </div>
            <div class="well">
                Message: {{message}}
                <div>
                    Valid:
                    <span class="summary" ng-class="myForm.$valid ? 'ng-valid' : 'ng-invalid'">
                        {{myForm.$valid}}
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="cb"></div>
    <br />
    <hr />
    <br />
    <div id="todoPanel" class="panel col-xs-3" ng-controller="validation5Ctrl">
        <form name="myForm" novalidate ng-submit="addNewUser(newUser)">
            <div class="well">
                <div class="form-group">
                    <label>Name:</label>
                    <input name="userName" type="text" class="form-control" required ng-model="newUser.name">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="userEmail" type="email" class="form-control" required ng-model="newUser.email">
                    <div class="error" ng-show="myForm.userEmail.$invalid && myForm.userEmail.$dirty">
                        {{getError(myForm.userEmail.$error)}}
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input name="agreed" type="checkbox" ng-model="newUser.agreed" required>
                        I agree to the terms and conditions
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" ng-disabled="myForm.$invalid">
                    OK
                </button>
            </div>
            <div class="well">
                Message: {{message}}
                <div>
                    Valid:
                    <span class="summary" ng-class="myForm.$valid ? 'ng-valid' : 'ng-invalid'">
                        {{myForm.$valid}}
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="cb"></div>
    <br />
    <hr />
    <br />
    <style>
        form.validate .ng-invalid-required.ng-dirty {
            background-color: lightpink;
        }
        form.validate .ng-invalid-email.ng-dirty {
            background-color: lightgoldenrodyellow;
        }
    </style>
    <div id="todoPanel" class="panel col-xs-3" ng-controller="validation6Ctrl">
        <form name="myForm" novalidate ng-submit="addNewUser(newUser)" ng-class="showValidation ? 'validate' : ''">
            <div class="well">
                <div class="form-group">
                    <label>Name:</label>
                    <input name="userName" type="text" class="form-control" required ng-model="newUser.name">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="userEmail" type="email" class="form-control" required ng-model="newUser.email">
                    <div class="error" ng-show="showValidation">
                        {{getError(myForm.userEmail.$error)}}
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    OK
                </button>
            </div>
        </form>
    </div>
</div>