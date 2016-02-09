ngClassStyle();
function ngClassStyle()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("ngClassStyleCtrl", function($scope, $http) {
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
        $scope.buttonNames = ["Red", "Green", "Blue"];
        $scope.settings = {
            Columns: "Green",
            Rows: "Red"
        };
        // Columns исользуется для того, чтобы задать фон для колонки Done
        // Rows используется для того, чтобы задать цвет для строк <tr>
    });
}