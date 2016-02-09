partialViews();
function partialViews()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    // директива ng-include превосходно подходит для управления partial view
    // но более часто вам приходится переключатся между небольшими кусками контента,
    // который уже содержится в документе и для этого в AngularJS есть директива ng-switch
    app.controller("partialViewsCtrl", function($scope, $http) {
        $scope.data = {};
        $scope.tasks = [
            { action: "Buy flowers", complete: false },
            { action: "Go to gym", complete: false },
            { action: "Buy snickers", complete: true },
            { action: "Buy notebook", complete: false },
            { action: "Call friends", complete: false },
            { action: "Go to cinema", complete: false },
            { action: "Buy Big-Mac", complete: true },
            { action: "Buy a book", complete: false },
            { action: "Call mom", complete: false }
        ];
        $scope.showFile = function () {
            return $scope.list ? "partial/list.html" : "partial/table.html";
        };
        $scope.displayMessage = function () {
            console.log("Content: " + $scope.showFile());
        };
        $scope.changeView = function () {
            return $scope.list ? "partial/list.html" : "partial/table.html";
        };
    });
}