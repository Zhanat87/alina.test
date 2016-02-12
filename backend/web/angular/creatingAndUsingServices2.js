creatingAndUsingServices2();
function creatingAndUsingServices2()
{
    $('html').attr('ng-app', 'studyModule');

    angular.module("studyModule", ["additionalModule2", "customServices2"])
        .controller("studyCtrl", function ($scope, usingServiceMethodLogService) {
            $scope.data = {
                cities: ["London", "New York", "Paris"],
                totalClicks: 0
            };
            $scope.$watch('data.totalClicks', function (newVal) {
                usingServiceMethodLogService.log("Total click count: " + newVal);
            });
        });
}