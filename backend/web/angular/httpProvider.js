httpProvider();
function httpProvider()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.config(function ($httpProvider) {
        $httpProvider.defaults.transformResponse.push(function (responseData, headers) {
            fruits = [];
            var fruitElems = angular.element(responseData.trim()).find("fruit");
            for (var i = 0; i < fruitElems.length; i++) {
                var fruit = fruitElems.eq(i);
                fruits.push({
                    name: fruit.attr("name"),
                    category: fruit.attr("category"),
                    price: fruit.attr("price")
                });
            }
            return fruits;
        })
    }).controller("httpProviderCtrl", function($scope, $http) {
        $scope.getFruits = function () {
            $http.get("/angular/ajax/xmlData.xml").success(function (responseData) {
                $scope.fruits = responseData;
            });
        }
    });

    app.config(function ($httpProvider) {
        $httpProvider.interceptors.push(function () {
            return {
                request: function (config) {
                    config.url = "/angular/ajax/data.json";
                    return config;
                },
                response: function (response) {
                    console.log("Fruits Count :" + response.data.length);
                    return response;
                }
            }
        });
    }).controller("httpProviderCtrl2", function($scope, $http) {
        $scope.getFruits = function () {
            $http.get("NotExists.xml").success(function (responseData) {
                $scope.fruits = responseData;
            });
        }
    });
}