multipleControllers();
function multipleControllers()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("multipleControllersCtrl", function($scope, $http) {
        $scope.setAddress = function (type, zip) {
            console.log("Type: " + type + " " + zip);
        };
        $scope.copyAddress = function () {
            $scope.shippingZip = $scope.billingZip;
        };
    });

    app.controller("firstCtrl", function ($scope) {
        $scope.value = "Hello from First Controller";
        $scope.reverseText = function () {
            $scope.value = $scope.value.split("").reverse().join("");
        }
    });

    app.controller("secondCtrl", function ($scope) {
        $scope.value = "Hello from Second Controller";
        $scope.reverseText = function () {
            $scope.value = $scope.value.split("").reverse().join("");
        }
    });
}