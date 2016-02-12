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
    <pre>
        http://angular.ru/api/ng.$http

        $http один из встроенных angular сервисов, которые обеспечивают
        обработку обычных, для веб-приложений, операций

        function PhoneListCtrl($scope, $http) {
            $http.get('phones/phones.json').success(function(data) {
                $scope.phones = data;
            });
            $scope.orderProp = 'age';
        }

        $http создаёт HTTP GET запрос для нашего приложения, который обращается к
        phone/phones.json (ссылка относительна к index.html). Сервер отвечает путём возвращения
        данных в json-файле. (Запрос может быть отослан не только к json-файлу,
        как сделано в этом учебнике, но и может быть динамически сгенерирован на сервере
        (при помощи php, например). Для приложения и браузера это будет равносильно.
        Такой формат был взят для упрощения примера.)

        Сервис $http возвращает обещание с методом success. Мы обращаемся к этому методу,
        для обработки ответа асинхронного запроса и присваивания данных к нашей области видимости,
        которая контролируется этим контроллером, как модель списка телефонов. Стоит отметить,
        что Angular обнаруживает ответ в формате json и парсит его для нас.

        Для использования сервисов в Angular, необходимо объявить имя зависимостей которые
        необходимы, в качестве аргументов для функции конструктора контроллера, например
        function PhoneListCtrl($scope, $http) {...}

        Система внедрение зависимостей Angular подключает службу к контроллеру в момент его построения.
        Внедрение зависимостей так же отвечает за создание переходных (временных) зависимостей,
        которые могут содержаться в сервисе (сервисы часто зависят от других сервисов).

        Обратите внимание, что имена аргументов имеют значения, потому что инжектор
        использует их для поиска зависимостей.

        Основной способ использования

        Сервис $http это функция, которая принимает один аргумент — объект с настройками —
        который используется для генерации HTTP запроса, и возвращает promise с двумя
        определенными в $http методами: success и error.

        $http({method: 'GET', url: '/someUrl'}).
            success(function(data, status, headers, config) {
                // this callback will be called asynchronously
                // when the response is available
            }).
            error(function(data, status, headers, config) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });

        Так как возвращаемым значением функции $http является promise, вы можете использовать
        метод then чтобы регистрировать колбэк, и они будут получать только один аргумент –
        объект представляющий ответ сервера. Смотрите определение API и
        типов для более детальной информации.

        Ответ сервера со статусом в диапазоне от 200 до 299 считается успешным, и в результате
        будет вызван колбэк success. Заметьте, если ответом сервиса является перенаправление
        на другую страницу, XMLHttpRequest будет ожидаемо следовать туда, а это означает,
        что колбэк error для таких ответов вызываться не будет.

        Сокращенные метод
        Каждый вызов сервиса $http обязательно принимает в параметрах HTTP метод и URL,
        и POST/PUT запросы к тому же обязательно передают данные,
        для сокращения их вызова были созданы сокращенные методы:
        $http.get('/someUrl').success(successCallback);
        $http.post('/someUrl', data).success(successCallback);

        Полный список сокращенных методов:
        $http.get
        $http.head
        $http.post
        $http.put
        $http.delete
        $http.jsonp
    </pre>
    <div ng-controller="ajaxHttpCtrl">
        <ng-include src="'loginPage.html'" ng-show="displayPage == 'loginPage'"></ng-include>
        <ng-include src="'createAccountPage.html'" ng-show="displayPage == 'createAccountPage'"></ng-include>
        <ng-include src="'privatePage.html'" ng-show="displayPage == 'privatePage'"></ng-include>
    </div>
</div>