anchorScrollService();
function anchorScrollService()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app
    //.config(function ($anchorScrollProvider) {
    //    $anchorScrollProvider.disableAutoScrolling();
    //})
    // используйте $anchorScrollProvider для устранение эффекта auto-scroll
    .controller("studyCtrl", function ($scope, $location, $anchorScroll) {
        //при использовании сервиса $anchorScroll не нужно использовать service объект, просто нужно указать dependency
        //когда объект сервиса уже создан он начинает следить за значением свойства hash $location сервиса и прокрутка
        //выполняется автоматически когда значение свойства меняется
        $scope.itemCount = 50;
        $scope.items = [];
        for (var i = 0; i < $scope.itemCount; i++) {
            $scope.items[i] = "Item " + i;
        }
        $scope.show = function (id) {
            $location.hash(id);
            //if (id == 'bottom') {
            //    $anchorScroll();
            //}
        }
    });
}