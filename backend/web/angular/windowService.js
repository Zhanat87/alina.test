windowService();
function windowService()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("windowServiceCtrl", function($scope, $window) {
        $scope.showHint = function (message) {
            $window.alert(message);
        }
    });
}