﻿ajaxUrlParameters();
function ajaxUrlParameters()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", ["ngResource", "ngRoute"]);
    /// <reference path="editorView.html" />
    app.constant("baseUrl", "http://backend.alina.test/angular/index/partial/")
        .config(function ($routeProvider) {

            $routeProvider.when("/list", {
                templateUrl: "http://backend.alina.test/angular/index/partial/tableViewUrlParameters.html"
            });

            $routeProvider.when("/edit/:id", {
                templateUrl: "http://backend.alina.test/angular/index/partial/editorViewUrlParameters.html"
            });

            $routeProvider.when("/create", {
                templateUrl: "http://backend.alina.test/angular/index/partial/editorViewUrlParameters.html"
            });

            $routeProvider.otherwise({
                templateUrl: "http://backend.alina.test/angular/index/partial/tableViewUrlParameters.html"
            });
        })
        .controller("ajaxUrlParametersCtrl", function ($scope, $http, $resource, $location, $route, $routeParams, baseUrl) {
            //$route сервис может использоватся для изменения url, для этого он содержит несколько свойств и метод:
            //    current - возвращает объект который содержит информацию об активном url
            //    reload() - перезагружает view даже если url не изменился
            //    routes - возвращает коллекцию url которые определены через $routeProvider
            //Так же этот сервис содержит ряд событий которые можно обрабатывать:
            //    $routeChangeStart - генерируется перед изменением URL
            //    $routeChangeSuccess - генерируется после успешного изменения URL
            //    $routeUpdate - генерируется при обновлении URL
            //    $routeChangeError - генерируется если URL нельзя изменить

            $scope.currentProduct = null;

            $scope.$on("$routeChangeSuccess", function () {
                if ($location.path().indexOf("/edit/") == 0) {
                    //в данном методе используется событие $routeChangeSuccess для того чтобы на изменение url,
                    //можно было получить новый URL с помощью сервиса $location
                    var id = $routeParams["id"];
                    //для того чтобы получить нужный сегмент URL следует использовать сервис $routeParams который хранит коллекцию параметров,
                    //значения которых можно получить по индекус параметра
                    for (var i = 0; i < $scope.products.length; i++) {
                        if ($scope.products[i].id == id) {
                            $scope.currentProduct = $scope.products[i];
                            //в данном контексте id нужен для определения объекта который нужно редактировать
                            break;
                        }
                    }
                }
            });

            $scope.productsResource = $resource(baseUrl + ":id", {id: "@id"});

            $scope.listProducts = function () {
                $scope.products = $scope.productsResource.query();
            }

            $scope.deleteProduct = function (product) {
                product.$delete().then(function () {
                    $scope.products.splice($scope.products.indexOf(product), 1);
                });

                $location.path("/list");
            }

            $scope.createProduct = function (product) {
                new $scope.productsResource(product).$save().then(function (newProduct) {
                    $scope.products.push(newProduct);
                    $location.path("/list");
                });
            }

            $scope.updateProduct = function (product) {
                product.$save();
                $location.path("/list");
            }

            $scope.saveEdit = function (product) {
                if (angular.isDefined(product.id)) {
                    $scope.updateProduct(product);
                } else {
                    $scope.createProduct(product);
                }

                $scope.currentProduct = {};
            }

            $scope.cancelEdit = function () {
                if ($scope.currentProduct && $scope.currentProduct.$get) {
                    $scope.currentProduct.$get();
                }
                $scope.currentProduct = {};
                $location.path("/list");
            }

            $scope.listProducts();
        })
}