processingExpressions();
function processingExpressions()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("processingExpressionsCtrl", function($scope, $http) {
        $scope.price = "100.23";
        $scope.data = [2,1,4,51];
    })
    .directive("evalExpression", function ($parse) {
        return function (scope, element, attrs) {
            scope.$watch(attrs["evalExpression"], function (newValue) {
                try {
                    var expressionFn = $parse(scope.expr);
                    // с помощью сервиса $parse получаем значение свойства expr и превращаем его в функцию
                    var result = expressionFn(scope);
                    // далее применяем эту функцию для scope
                    if (result == undefined) {
                        result = "No result";
                    }
                } catch (err) {
                    result = "Cannot evaluate expression";
                }
                element.text(result);
            });
        }
    })
    .controller("processingExpressionsCtrl2", function ($scope) {
        $scope.dataValue = "100.23";
    })
    .directive("evalExpression2", function ($interpolate) {
        var interpolationFn
            = $interpolate("The total is: {{amount | currency}} (including tax)");
        return {
            scope: {
                amount: "=amount",
                tax: "=tax"
            },
            link: function (scope, element, attrs) {
                scope.$watch("amount", function (newValue) {
                    var localData = {
                        total: Number(newValue)
                        + (Number(newValue) * (Number(scope.tax) / 100))
                    }
                    element.text(interpolationFn(scope));
                });
            }
        }
    })
    .controller("processingExpressionsCtrl3", function ($scope) {
        $scope.cities = ["London", "Paris", "New York"];
    })
    .directive("evalExpression3", function ($compile) {
        return function (scope, element, attrs) {
            var content = "<ul><li ng-repeat='city in cities'>{{city}}</li></ul>";
            var listElem = angular.element(content);
            var compileFn = $compile(listElem);
            // сервис $compile обрабатывает фрагмент html разметки,
            // который содержит привязки или выражения angularjs и
            // создает функцию, которую далее можно использовать
            compileFn(scope);
            // вызывая функцию передаем туда scope, который содержит массив элементов
            element.append(listElem);
            // модифицируем DOM
        }
    });
}