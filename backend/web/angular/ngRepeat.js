ngRepeat();
function ngRepeat()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("booksRepeatCtrl", function($scope, $http) {
        $http.get($('#booksRepeatDiv').attr('url')).
        success(function(data, status, headers, config) {
            $scope.books = data;
        }).
        error(function(data, status, headers, config) {
            console.log('data');
            console.log(data);
            console.log('status');
            console.log(status);
        });
    });
}