jqLite();
function jqLite()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.directive("customDirective", function () {
            return function (scope, element, attributes) {
                // element - это jqLite объект, на котором доступны все выше описанные функции,
                // этот объект представляет элемент, к которому была применена директива
                var elements = element.children();
                for (var i = 0; i < elements.length; i++) {
                    if (elements.eq(i).text() == "Red") {
                        elements.eq(i).css("color", "red");
                    }
                }
            }
        })
        .directive("customDirective2", function () {
            return function (scope, element, attributes) {
                // метод children хорош, но только если вам нужно выбрать
                // непосредственно дочерний элемент по отношению к текущему.
                // если же вам нужно выбрать все элементы, которые имеют
                // определенные значения, то нужно использовать метод find(),
                // который будет проходить по всем вложенным элементам и так же проверять их
                var elements = element.find("li");
                for (var i = 0; i < elements.length; i++) {
                    if (elements.eq(i).text() == "Red") {
                        elements.eq(i).css("color", "red");
                    }
                }
            }
        })
        .directive("customDirective3", function () {
            return function (scope, element, attributes) {
                var elements = element.find("li");
                for (var i = 0; i < elements.length; i++) {
                    if (elements.eq(i).text() == "Red") {
                        elements.eq(i).addClass("target");
                    } else {
                        elements.eq(i).addClass("missing");
                    }
                }
            }
        })
        .directive("customDirective4", function () {
            return function (scope, element, attributes) {
                var elements = angular.element("<ul>");
                element.append(elements);
                for (var i = 0; i < scope.colors.length; i++) {
                    elements.append(angular.element("<li>").append(angular.element("<span>").text(scope.colors[i])));
                }
            }
        })
        .directive("customDirective5", function () {
            return function (scope, element, attributes) {
                var elem = angular.element("<ul>");
                element.append(elem);
                for (var i = 0; i < scope.colors.length; i++) {
                    elem.append(angular.element("<li>").append(angular.element("<span>").text(scope.colors[i])));
                }
                var button = element.find("button");
                button.on("click", function (e) {
                    element.find("li").toggleClass("red");
                });
            }
        })
        .controller("jqLiteCtrl", function($scope, $http) {
            $scope.colors = ["Red", "Black", "Navy", "Green", "Yellow"];
        });
}