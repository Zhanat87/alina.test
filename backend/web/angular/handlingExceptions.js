handlingExceptions();
function handlingExceptions()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("handlingExceptionsCtrl", function($scope, $exceptionHandler) {
        $scope.throwEx = function () {
            try {
                throw new Error("Triggered Exception");
            } catch (ex) {
                $exceptionHandler(ex.message, "Button Click");
            }
        }
    }).controller("handlingExceptionsCtrl2", function ($scope, $exceptionHandler) {
            $scope.throwEx = function () {
                try {
                    throw new Error("Triggered Exception");
                } catch (ex) {
                    $exceptionHandler(ex.message, "Button Click");
                }
            }
        })
        .factory("$exceptionHandler", function ($log) {
            return function (exception, cause) {
                $log.error("Message: " + exception.message + " (Cause: " + cause + ")");
                // здесь переопределяется стандартный сервис для обработки ошибок,
                // в данном случае изменяется формат отображения ошибки,
                // но переопределять сервис для обработки ошибок плохая практика
                // так как если он не будет корректно работать то это значительно
                // усложнит работу
            }
        });
}