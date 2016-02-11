customFilters();
function customFilters()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("customFiltersCtrl", function($scope, $http) {
        $scope.items = [
            { itemName: "milk", itemCategory: "Dairy", itemPrice: 1.40, expireDate: 1 },
            { itemName: "cheese", itemCategory: "Dairy", itemPrice: 2.40, expireDate: 2 },
            { itemName: "water", itemCategory: "Drinks", itemPrice: 1.20, expireDate: 366 },
            { itemName: "juice", itemCategory: "Drinks", itemPrice: 3.30, expireDate: 60 },
            { itemName: "potato", itemCategory: "Vegetable", itemPrice: 5.90, expireDate: 14 },
            { itemName: "tomato", itemCategory: "Vegetable", itemPrice: 6.88, expireDate: 9 }
        ];

        $scope.customSorter = function (value) {
            return value.expireDate < 5 ? 0 : value.itemPrice;
        };
    });
}