creatingAndUsingServices();
function creatingAndUsingServices()
{
    $('html').attr('ng-app', 'studyModule');
    angular.module("studyModule", ["additionalModule", "customServices"])
        .controller("studyCtrl", function ($scope, usingFactoryMethodLogService) {
            //для того чтобы использовать сервис нужно лишь указать ео в зависимостях
            $scope.data = {
                cities: ["London", "New York", "Paris"],
                totalClicks: 0
            };
            $scope.$watch('data.totalClicks', function (newVal) {
                usingFactoryMethodLogService.log("Total click count: " + newVal);
                // и потом обратится к методу который существует у этого сервиса
                // преимущества сервиса очевидны: он предоставляет только API, например если метод log изменится,
                // то это никак не повлияет на те места где его вызывали это дает огромное преимущество при тестировании
            });
        });
}