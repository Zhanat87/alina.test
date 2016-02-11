manipulatingWithScope();
function manipulatingWithScope()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.directive("scopeExample", function () {
            return {
                template: "<div class='panel-body'>Type something: <input ng-model=data /></div>"
            }
        })
        .directive("scopeExample3", function () {
            return {
                template: function () {
                    return angular.element(document.querySelector("#customTemplate")).html();
                },
                scope: true
            }
        })
        .controller("manipulatingWithScopeCtrl", function($scope, $http) {
            $scope.defaultCaption = "Caption";
            // $scope.data = { caption: "Caption" };
            // TODO измените свойства на объект (уберите комментарий и закоментируйте существующий код)
            // TODO объясните почему теперь пример работает иначе

        })
        .directive("scopeExample2", function () {
            return {
                template: "<div class='panel-body'>Type something: <input ng-model=data /></div>"
            }
        })
        .controller("firstCtrl", function ($scope) {
        })
        .controller("secondCtrl", function ($scope) {
        })
        .directive("scopeExample4", function () {
            return {
                template: function () {
                    return angular.element(document.querySelector("#customTemplate2")).html();
                },
                scope: {}
            }
        })
        .controller("manipulatingWithScopeCtrl2", function ($scope) {
            $scope.data = { caption: "Caption" };
        })
        .directive("scopeExample5", function () {
            return {
                template: function () {
                    return angular.element(document.querySelector("#customTemplate3")).html();
                },
                scope: {
                    property: "@color"
                    // 2) с помощью @ указываем one-way binding на атрибут name
                    // one-way binding в isolated scope применим только к строкам,
                    // если вы хотите создать binding к типу отличному
                    // от строки следует использовать two-way binding
                }
            }
        })
        .controller("manipulatingWithScopeCtrl3", function ($scope) {
            $scope.data = { color: "Green" };
        })
        .directive("scopeExample6", function () {
            return {
                template: function () {
                    return angular.element(document.querySelector("#customTemplate4")).html();
                },
                scope: {
                    property: "=source"
                    // 2) с помощью = указываем two-way binding на атрибут nameprop
                }
            }
        })
        .controller("manipulatingWithScopeCtrl4", function ($scope) {
            $scope.data = { value: "Some Value" };
        })
        .directive("scopeExample7", function () {
            return {
                template: function () {
                    return angular.element(document.querySelector("#template")).html();
                },
                scope: {
                    fruit: "=fruitName",
                    getType: "&value"
                    //& указывает что значение свойства getType будет привязано к функции
                }
            }
        })
        .controller("manipulatingWithScopeCtrl5", function ($scope) {
            $scope.data = { fruit: "Apple" };
            $scope.getKind = function (value) {
                return value == "Apple" ? " It's a Fruit" : " I don't know :(";
            }
        });
}