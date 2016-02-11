controllerCommunication();
function controllerCommunication()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("controllerCommunicationCtrl", function($scope, $rootScope) {
        $scope.$on("zipCodeUpdated", function (event, args) {
            $scope[args.type] = args.zipCode;
        });
        // данная функция является обработчиком на событие zipCodeUpdated,
        // в event содержатся данные, которые были переданы вместе с инициацией события
        // это type и zip, далее в теле функции происходит присвоение
        // текущему scope значений из scope инициатора события
        // $scope[args.type] = args.zipCode; выражение эквивалентно $scope.billingZip = billingZip
        $scope.setAddress = function (type, zip) {
            $rootScope.$broadcast("zipCodeUpdated", {
                type: type, zipCode: zip
            });
            // данная функция после получения данных генерирует событие zipCodeUpdated,
            // которое содержит дополнительные данные
            console.log("Type: " + type + " " + zip);
        };
        $scope.copyAddress = function () {
            $scope.shippingZip = $scope.billingZip;
        };
    });

    app.service("ZipCodes", function ($rootScope) {
            return {
                setZipCode: function (type, zip) {
                    this[type] = zip;
                    $rootScope.$broadcast("zipCodeUpdated", {
                        type: type, zipCode: zip
                    });
                }
            }
    }).controller("controllerCommunicationCtrl2", function($scope, ZipCodes) {
        $scope.$on("zipCodeUpdated", function (event, args) {
            $scope[args.type] = args.zipCode;
        });
        $scope.setAddress = function (type, zip) {
            ZipCodes.setZipCode(type, zip);
            console.log("Type: " + type + " " + zip);
        };
        $scope.copyAddress = function () {
            $scope.shippingZip = $scope.billingZip;
        };
    });
}