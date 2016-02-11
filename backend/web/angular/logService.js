logService();
function logService()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("logServiceCtrl", function($scope, $log) {
        $scope.log = function () {
            $log.log("Log message");
        }
    });
}