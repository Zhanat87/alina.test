filtersChain();
function filtersChain()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("filtersChainCtrl", function($scope, $http) {
        $scope.items = [
            { itemName: "Milk", itemCategory: "Dairy", itemPrice: 1.40, expireDate: 1 },
            { itemName: "Cheese", itemCategory: "Dairy", itemPrice: 2.40, expireDate: 2 },
            { itemName: "Water", itemCategory: "Drinks", itemPrice: 1.20, expireDate: 366 },
            { itemName: "Juice", itemCategory: "Drinks", itemPrice: 3.30, expireDate: 60 },
            { itemName: "Potato", itemCategory: "Vegetable", itemPrice: 5.90, expireDate: 14 },
            { itemName: "Tomato", itemCategory: "Vegetable", itemPrice: 6.88, expireDate: 9 }
        ];

        $scope.customSorter = function (value) {
            return value.expireDate < 5 ? 0 : value.itemPrice;
        };
    });
}