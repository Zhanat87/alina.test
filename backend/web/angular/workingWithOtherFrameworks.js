workingWithOtherFrameworks();
function workingWithOtherFrameworks()
{
    $(document).ready(function () {
        $('#jQueryUI button').button().click(function (e) {
            angular.element(angularRegion).scope().$apply('clickHandler()');
            // angular.element является оберткой для представления HTML элемента как элемента JQuery,
            // в этот метод передается id элемента div, метод возвращает объект,
            // на котором можно вызвать метод scope(),
            // который в свою очередь вернет интересующий scope
            // далее, используя метод $apply вызывается функция из контроллера angular
        });
    });

    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("workingWithOtherFrameworksCtrl", function($scope, $http) {
        $scope.buttonEnabled = true;
        $scope.clickCounter = 0;
        $scope.clickHandler = function () {
            $scope.clickCounter++;
        }
        $scope.$watch('buttonEnabled', function (newValue) {
            $('#jQueryUI button').button({
                disabled: !newValue
            });
        });
        // $watch метод регистрирует функию,
        // которая будет вызвана когда значение в scope изменится
    });
}