creatingAndUsingServices3();
function creatingAndUsingServices3()
{
    $('html').attr('ng-app', 'studyModule');

    angular.module("studyModule", ["additionalModule", "customServices"])
        .config(function (usingProviderMethodLogServiceProvider) {
            usingProviderMethodLogServiceProvider.debugEnabled(true).messageCounterEnabled(true);
            // AngularJS для provider объектов предоставляет возможность работать с
            // Dependency Injection используя имя сервиса + слово Provider,
            // таким образом мы получаем provider объект, лучше всего использовать provider
            // объект для настройки в config() методе так как
            // он будет выполнятся только после того как все модули будут загуржены,
            // в данном случае мы настраиваем service объект

        })
        .controller("studyCtrl", function ($scope, usingProviderMethodLogService) {
            $scope.data = {
                cities: ["London", "New York", "Paris"],
                totalClicks: 0
            };
            $scope.$watch('data.totalClicks', function (newVal) {
                usingProviderMethodLogService.log("Total click count: " + newVal);
            });
        });
}