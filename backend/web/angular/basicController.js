basicController();
function basicController()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("basicController", function($scope, $http) {

    });

    app.controller("basicController2", function($scope, $http) {
        $scope.fruit = "Apple";
        $scope.getFruit = function (fruit) {
            switch (fruit) {
                case "Apple":
                    return "Yes!";
                case "Banana":
                    return "Nope!";
            };
        };
        // преимущественно $scope в контроллере исполузуется для 2ух целей:
        // 1)передать данные во view
        // 2) определить функции которые могут быть вызваны из view
    });

    app.controller("basicController3", function($scope, $http) {
        $scope.cities = ["London", "New York", "Paris"];
        $scope.getCountry = function (city) {
            switch (city) {
                case "London":
                    return "UK";
                case "New York":
                    return "USA";
            };
        };
        // изменяя значения в scope изменяются все привязки для этого значения
    });

    app.controller("basicController4", function($scope, $http) {
        $scope.logins = [];
        $scope.setLogin = function (key, value) {
            $scope.logins[key] = value;
        };
        $scope.copyLogin = function () {
            $scope.password = $scope.login;
        };
    });

    /*
     если вам не нужны возможности, которые привносит собой scope или
     по какой-то другой причине вы не хотите использовать scope, то
     можете без него обойтись используя scopeLess технику
     */
    app.controller("basicController5", function() {
        this.dataValue = "Hello, world!";
        this.reverseText = function () {
            this.dataValue = this.dataValue.split("").reverse().join("");
        };
    });
}