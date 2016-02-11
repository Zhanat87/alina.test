intervalAndTimeoutServices();
function intervalAndTimeoutServices()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("intervalAndTimeoutServicesCtrl", function ($scope, $interval) {
        $interval(function () {
            $scope.time = new Date().toTimeString();
        }, 2000);
    });
}