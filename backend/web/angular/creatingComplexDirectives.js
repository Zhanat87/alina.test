creatingComplexDirectives();
function creatingComplexDirectives()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.directive("orderedList", function () {
            return {
                link: function (scope, element, attributes) {
                    var data = scope[attributes["orderedList"]] || attributes["listSource"];
                    var expression = attributes["property"] || "price" | "currency";
                    if (angular.isArray(data)) {
                        var elem = angular.element("<ol>");
                        if (element[0].nodeName == "#comment") {
                            element.parent().append(elem);
                        } else {
                            element.append(elem);
                        }
                        for (var i = 0; i < data.length; i++) {
                            var itemElement = angular.element("<li>").text(scope.$eval(expression, data[i]));
                            elem.append(itemElement);
                        }
                    }
                },
                restrict: "EACM"
                // свойство restrict указывает как можно применить директиву,
                // существует несколько аргументов которые нужно указывать:
                // E - позволяет применить директиву как элемент
                // A - позволяет применить директиву как атрибут
                // C - позволяет применить директиву как класс
                // M - позволяет применить директиву как комментарий
            }
        }).directive("orderedList2", function () {
            return {
                link: function (scope, element, attributes) {
                    scope.data = scope[attributes["orderedList2"]];
                },
                restrict: "A",
                template: "<ol><li ng-repeat='item in data'>{{item.itemName}}</li></ol>"
            }
        }).directive("orderedList3", function () {
            return {
                link: function (scope, element, attributes) {
                    scope.data = scope[attributes["orderedList3"]];
                },
                restrict: "A",
                template: function () {
                    return angular.element(document.querySelector("#template")).html();
                    // jqLite не позволяет выбрать элемент по его id,
                    // а подключать JQuery для этого не имеет смысла
                    // поэтому здесь используется метод DOM API
                    // для выбора элемента document.querySelector
                }
            }
        }).directive("orderedList4", function () {
            return {
                link: function (scope, element, attributes) {
                    scope.data = scope[attributes["orderedList4"]];
                },
                restrict: "A",
                templateUrl: "partial/template.html"
            }
        }).directive("orderedList5", function () {
            return {
                link: function (scope, element, attributes) {
                    scope.data = scope[attributes["orderedList5"]];
                },
                restrict: "A",
                templateUrl: function (element, attributes) {
                    return attributes["template"] == "table" ? "partial/tableTemplate.html" : "partial/template.html";
                }
            }
        }).directive("orderedList6", function () {
            return {
                link: function (scope, element, attrs) {
                    scope.data = scope[attrs["orderedList6"]];
                },
                restrict: "A",
                templateUrl: "partial/tableTemplate.html",
                replace: true
            }
        }).controller("creatingComplexDirectivesCtrl", function($scope, $http) {
            $scope.items = [
                { itemName: "Table", itemPrice: 44.10 },
                { itemName: "Chair", itemPrice: 21.20 },
                { itemName: "Pillow", itemPrice: 12.20 },
                { itemName: "Picture", itemPrice: 112.70 },
                { itemName: "Lamp", itemPrice: 28.31 }
            ];
        });
}