filterSingleData();
function filterSingleData()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("filterSingleDataCtrl", function($scope, $http) {
        $scope.items = [
            { itemName: "Milk", itemCategory: "Dairy", itemPrice: 12345678.40, expireDate: 1 },
            { itemName: "Cheese", itemCategory: "Dairy", itemPrice: 2.40, expireDate: 2 },
            { itemName: "Water", itemCategory: "Drinks", itemPrice: 1.20, expireDate: 366 },
            { itemName: "Juice", itemCategory: "Drinks", itemPrice: 3.30, expireDate: 60 },
            { itemName: "Potato", itemCategory: "Vegetable", itemPrice: 5.90, expireDate: 14 },
            { itemName: "Tomato", itemCategory: "Vegetable", itemPrice: 6.88, expireDate: 9 }
        ];
        // TODO: uncomment
        //for (var i = 0; i < $scope.items.length; i++) {
        //    $scope.items[i].itemPrice = "$" + Number($scope.items[i].itemPrice).toFixed(2);
        //}
        // можно форматировать данные из контроллера но такой подход имеет ряд недостатков:
        //   - значение валюты задается хардкодом, в фильтре его можно менять в зависимости от локали
        //   - данные модифицируются в источнике
        //   - теряется возможность использовать одни и те же данные в разных view,
        //     так как они уже модифицированы в источнике
        //   - число превращается в строку и для операций с числами нужно парсить строку

        $scope.getExpiryDate = function (days) {
            var now = new Date();
            return now.setDate(now.getDate() + days);
        }
    });
}