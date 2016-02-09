ngCloak();
function ngCloak()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("ngCloakCtrl", function($scope, $http) {
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
    });
}