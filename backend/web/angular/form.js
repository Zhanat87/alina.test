form();
function form()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("formCtrl", function($scope, $http) {
        $scope.requireValue = true;
        $scope.matchPattern = new RegExp("^[a-z]");
    });

    app.controller("form2Ctrl", function($scope, $http) {
        $scope.inputValue2 = false;
    });

    app.controller("form3Ctrl", function($scope, $http) {
        $scope.requireValue = true;
        $scope.matchPattern = new RegExp("^[a-z]");
    });

    app.controller("form4Ctrl", function($scope, $http) {
        $scope.tasks = [
            {action: "Go to cinema", complete: false },
            {action: "Buy Big-Mac", complete: true },
            {action: "Buy a book", complete: false },
            {action: "Call mom", complete: false }
        ];
    });

    app.controller("form5Ctrl", function($scope, $http) {
        $scope.tasks = [
            {priority:'High priority', action: "Go to cinema", complete: false },
            {priority:'High priority', action: "Buy Big-Mac", complete: true },
            {priority:'Regular priority', action: "Buy a book", complete: false },
            {priority: 'Regular priority', action: "Call mom", complete: false }
        ];
    });
}