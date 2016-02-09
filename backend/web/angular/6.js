();
function ()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("Ctrl", function($scope, $http) {

    });
}