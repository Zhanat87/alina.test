moduleDependency();
function moduleDependency()
{
    $('html').attr('ng-app', 'studyModule');
    angular.module("studyModule", ["additionalModule"])
        .controller("studyCtrl", function ($scope) {
            $scope.data = {
                cities: ["London", "New York", "Paris"],
                totalClicks: 0
            };
            $scope.$watch('data.totalClicks', function (newVal) {
                console.log("Total click count: " + newVal);
            });
        });
}