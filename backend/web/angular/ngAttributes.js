ngAttributes();
function ngAttributes()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("ngAttributesCtrl", function($scope, $http) {
        $scope.dataValue = false;
    });
}