<?php

use yii\helpers\Html;
use backend\assets\AngularAsset;
use backend\assets\AngularBindingAsset;

/**
 * @var yii\web\View $this
 */

$this->title = 'built-in services list';
$this->params['breadcrumbs'][] = $this->title;

AngularAsset::register($this);
AngularBindingAsset::register($this);
?>
<div class="row">
    <h1>
        <?php echo Html::encode($this->title); ?>
    </h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название серивса</th>
            <th>Описание</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>$anchorScroll</td>
            <td>Используется для скролла окна браузера до определенного якоря</td>
        </tr>
        <tr>
            <td>$animate</td>
            <td>Используется для анимации</td>
        </tr>
        <tr>
            <td>$compile</td>
            <td>Обрабатывает фрагмент разметки для создания функции которая может генерировать контент</td>
        </tr>
        <tr>
            <td>$controller</td>
            <td>Является оберткой над $injector сервисом который инстанциирует контроллеры</td>
        </tr>
        <tr>
            <td>$document</td>
            <td>Представляет jqLite объект который содержит DOM объект window.document</td>
        </tr>
        <tr>
            <td>$exceptionHandler</td>
            <td>Используется для обработки ошибок которые возникают в приложении</td>
        </tr>
        <tr>
            <td>$filter</td>
            <td>Используется для создания фильтров</td>
        </tr>
        <tr>
            <td>$http</td>
            <td>Используется для создания и управления AJAX запросами</td>
        </tr>
        <tr>
            <td>$injector</td>
            <td>Создает экземпляр AngularJS компонента</td>
        </tr>
        <tr>
            <td>$interpolate</td>
            <td>Обрабатывает строку которая содержит выражение привязки для создания функции которая может использоватся для генерации контента</td>
        </tr>
        <tr>
            <td>$interval</td>
            <td>Обертка над window.setInterval функцией</td>
        </tr>
        <tr>
            <td>$location</td>
            <td>Обертка над объектом location</td>
        </tr>
        <tr>
            <td>$log</td>
            <td>Обертка над global console объектом</td>
        </tr>
        <tr>
            <td>$parse</td>
            <td>Обрабатывает выражение для создания функции которая может использоватся для генерации контента</td>
        </tr>
        <tr>
            <td>$provide</td>
            <td>Реализует множество методов которые представлены в Module</td>
        </tr>
        <tr>
            <td>$q</td>
            <td>Используется для работы с promises</td>
        </tr>
        <tr>
            <td>$resource</td>
            <td>Предоставляет возможность работы с RESTfull API</td>
        </tr>
        <tr>
            <td>$rootElement</td>
            <td>Предоставляет доступ к корневому элоементу DOM</td>
        </tr>
        <tr>
            <td>$rootScope</td>
            <td>Предоставляет доступ к корневому scope</td>
        </tr>
        <tr>
            <td>$route</td>
            <td>Используется для работы с путями и множеством view</td>
        </tr>
        <tr>
            <td>$routeParams</td>
            <td>Предоставляет информацию о URL</td>
        </tr>
        <tr>
            <td>$sanitize</td>
            <td>Заменяет небезопасные HTML символы на безопасные</td>
        </tr>
        <tr>
            <td>$sce</td>
            <td>Удаляет опасные элементы и аттрибуты из HTML строки чтобы сделать ее безопасной для отображения</td>
        </tr>
        <tr>
            <td>$swipe</td>
            <td>Используется для распознавания гестур</td>
        </tr>
        <tr>
            <td>$timeout</td>
            <td>Обертка над window.setTimeout()</td>
        </tr>
        <tr>
            <td>$window</td>
            <td>Предоставляет ссылку на DOM объект - window</td>
        </tr>
        </tbody>
    </table>
</div>