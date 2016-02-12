ajaxUsingConfigInRequests();
function ajaxUsingConfigInRequests()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("ajaxUsingConfigInRequestsCtrl", function($scope, $http) {
        $scope.getFruits = function () {
            var config = {
                transformResponse: function (responseData, headers) {
                    fruits = [];
                    var elem = angular.element(responseData.trim()).find("fruit");
                    for (var i = 0; i < elem.length; i++) {
                        var fruit = elem.eq(i);
                        fruits.push({
                            name: fruit.attr("name"),
                            price: fruit.attr("price")
                        });
                    }
                    return fruits;
                }
            }
            $http.get("/angular/ajax/xmlData.xml", config).success(function (responseData) {
                $scope.fruits = responseData;
            });
        }
    });

    app.controller("ajaxUsingConfigInRequestsCtrl2", function($scope, $http) {
        $scope.getFruits = function () {
            $http.get("/angular/ajax/data.json").success(function (responseData) {
                $scope.fruits = responseData;
            })
        }
        $scope.sendXmlData = function () {
            var config = {
                headers: {
                    "content-type": "application/xml"
                },
                transformRequest: function (data, headers) {
                    var rootElement = angular.element("<xml>");
                    for (var i = 0; i < data.length; i++) {
                        var element = angular.element("<fruit>");
                        element.attr("name", data[i].name);
                        element.attr("price", data[i].price);
                        rootElement.append(element);
                    }
                    rootElement.children().wrap("<fruits>");
                    return rootElement.html();
                }
            }
            $http.post("/angular/index/ajax-using-config-in-requests", $scope.fruits, config);
        }
    });
}