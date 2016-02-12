basicAjax();
function basicAjax()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("basicAjaxCtrl", function($scope, $http) {
        // $http-сервис позволяет работать с ajax
        $scope.getFruits = function () {
            $http.get("/angular/ajax/data.json").success(function (responseData) {
                // вызвав метод get сервиса выполняем GET запрос
                $scope.fruits = responseData;
                // полученные данные записываем в свойство products на $scope,
                // далее AngularJS самостоятельно обновит все привязки
            })
        }
    });

    app.controller("basicAjaxCtrl2", function($scope, $http) {
        $scope.getFruits = function () {
            $http.get("/angular/ajax/data.json").then(function (response) {
                console.log("Status: " + response.status);
                console.log("Type: " + response.headers("content-type"));
                console.log("Length: " + response.headers("content-length"));
                $scope.fruits = response.data;
            })
        }
    });

    app.controller("basicAjaxCtrl3", function($scope, $http) {
        $scope.getFruits = function () {
            $http.get("/angular/ajax/xmlData.xml").then(function (response) {
                $scope.fruits = [];
                var sourceElems = angular.element(response.data.trim()).find("fruit");
                // для работы с xml можно так же использовать jqLite,
                // в данном случае используется метод find() который возвращает
                // jqLite-объект, который содержит найденные элементы
                for (var i = 0; i < sourceElems.length; i++) {
                    var elem = sourceElems.eq(i);
                    // метод eq() используется так как мы работаем с объектом
                    $scope.fruits.push({
                        name: elem.attr("name"),
                        price: elem.attr("price")
                    });
                }
            });
        }
    });
}