moduleExtension();
function moduleExtension()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("moduleExtensionCtrl", function ($scope) {
        $scope.data = {
            cities: ["London", "New York", "Paris"],
            totalClicks: 0
        };
        $scope.$watch('data.totalClicks', function (newVal) {
            console.log("Total click count: " + newVal);
        });
    });
}