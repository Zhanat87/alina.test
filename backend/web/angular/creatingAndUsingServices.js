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

    angular.module("studyModule", ["additionalModule", "customServices"])
        .controller("studyCtrl2", function ($scope, usingServiceMethodLogService) {
            $scope.data = {
                cities: ["London", "New York", "Paris"],
                totalClicks: 0
            };
            $scope.$watch('data.totalClicks', function (newVal) {
                usingServiceMethodLogService.log("Total click count: " + newVal);
            });
        });

    angular.module("studyModule", ["additionalModule", "customServices"])
        .config(function (logServiceProvider) {
            logServiceProvider.debugEnabled(true).messageCounterEnabled(true);
            // AngularJS для provider объектов предоставляет возможность работать с
            // Dependency Injection используя имя сервиса + слово Provider,
            // таким образом мы получаем provider объект, лучше всего использовать provider
            // объект для настройки в config() методе так как
            // он будет выполнятся только после того как все модули будут загуржены,
            // в данном случае мы настраиваем service объект

        })
        .controller("studyCtrl3", function ($scope, usingProviderMethodLogService) {
            $scope.data = {
                cities: ["London", "New York", "Paris"],
                totalClicks: 0
            };
            $scope.$watch('data.totalClicks', function (newVal) {
                usingProviderMethodLogService.log("Total click count: " + newVal);
            });
        });
}