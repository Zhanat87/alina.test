processingDangerousData();
function processingDangerousData()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", ["ngSanitize"]);

    app.controller("processingDangerousDataCtrl", function($scope, $http) {
        $scope.htmlData = "<p>This is <b onmouseover=alert('Attack!')>dangerous</b> data</p>";
    })
    // ngSanitize модуль angularjs который необходим для корректной работы с сервисом $sanitize
    .controller("processingDangerousDataCtrl2", function ($scope) {
        $scope.htmlData = "<p>This is <b onmouseover=alert('Attack!')>dangerous</b> data</p>";
        // если навести курсор то обработчик события не сработает
    })
    .controller("processingDangerousDataCtrl3", function ($scope, $sanitize) {
        $scope.dangerousData = "<p>This is <b onmouseover=alert('Attack!')>dangerous</b> data</p>";
        $scope.$watch("dangerousData", function (newValue) {
            $scope.htmlData = $sanitize(newValue);
        })
    })
    .controller("processingDangerousDataCtrl4", function ($scope, $sce) {
        $scope.htmlData
            = "<p>This is <b onmouseover=alert('Attack!')>dangerous</b> data</p>";

        $scope.$watch("htmlData", function (newValue) {
            $scope.trustedData = $sce.trustAsHtml(newValue);
        });
    });
}