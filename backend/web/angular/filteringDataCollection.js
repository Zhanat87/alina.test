filteringDataCollection();
function filteringDataCollection()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("filteringDataCollectionCtrl", function($scope, $http) {
        $scope.items = [
            { itemName: "Milk", itemCategory: "Dairy", itemPrice: 1.40, expireDate: 1 },
            { itemName: "Cheese", itemCategory: "Dairy", itemPrice: 2.40, expireDate: 2 },
            { itemName: "Water", itemCategory: "Drinks", itemPrice: 1.20, expireDate: 366 },
            { itemName: "Juice", itemCategory: "Drinks", itemPrice: 3.30, expireDate: 60 },
            { itemName: "Potato", itemCategory: "Vegetable", itemPrice: 5.90, expireDate: 14 },
            { itemName: "Tomato", itemCategory: "Vegetable", itemPrice: 6.88, expireDate: 9 }
        ];

        $scope.limitValue = "5";
        $scope.limitRange = [];
        for (var i = (0 - $scope.items.length) ; i <= $scope.items.length; i++) {
            $scope.limitRange.push(i.toString());
        }
        $scope.selectItems = function (item) {
            return item.itemCategory == "Dairy" || item.itemCategory == "Drinks";
            // функция для каждого элемента item сравнивает его
            // с Dairy или Drinks и если они равны, то возвращает true
        };

        $scope.customSorter = function (value) {
            return value.expireDate < 10 ? 0 : value.itemPrice;
            // функция сортировки проверяет если дата конца срока годности продукта меньше 10 дней,
            // то этот продукт следует расположить на первое место в массиве
        };
    });
}