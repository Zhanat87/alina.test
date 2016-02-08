ngRepeat();
function ngRepeat()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    // 'customModule'  Определяет модуль customModule.
    // Можно использовать модули для настройки существующих сервисов,
    // а так же определять новые сервисы, директивы, фильтры и т.д.
    // [] Модули могут зависить от других модулей.

    app.controller("booksRepeatCtrl", function($scope, $http) {
        // $scope содержит данные модели. Это связующее звено между контроллером и видом.
        // $scope всего лишь один из сервисов, внедренных в контроллер.
        $http.get($('#booksRepeatDiv').attr('url')).
        success(function(data, status, headers, config) {
            $scope.books = data;
        }).
        error(function(data, status, headers, config) {
            console.log('data');
            console.log(data);
            console.log('status');
            console.log(status);
        });
    });
}