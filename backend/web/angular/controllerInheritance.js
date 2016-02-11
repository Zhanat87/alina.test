controllerInheritance();
function controllerInheritance()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("parentCtrl", function ($scope) {
        $scope.value = "Hello";
        $scope.reverseText = function () {
            $scope.value = $scope.value.split("").reverse().join("");
        };
        $scope.changeCase = function () {
            var result = [];
            angular.forEach($scope.value.split(""), function (char, index) {
                result.push(index % 2 == 1 ? char.toString().toUpperCase() : char.toString().toLowerCase());
            });
            $scope.value = result.join("");
        };
    });
    app.controller("firstChildCtrl", function ($scope) {
        $scope.changeCase = function () {
            $scope.value = $scope.value.toLowerCase();
        };
    });
    app.controller("secondChildCtrl", function ($scope) {
        $scope.changeCase = function () {
            $scope.value = $scope.value.toLowerCase();
        };
        // так же в AngularJS существует возмозность переопределить унаследованные функции и данные на локальные.
        // встретив метод, Angular ищет его реализацию в текущем контроллере и
        // если не находит, то двигается вверх по иерархии контроллеров просматривая каждый,
        // пока не обнаружит нужный метод
        $scope.shiftFour = function () {
            var result = [];
            angular.forEach($scope.value.split(""), function (char, index) {
                result.push(index < 4 ? char.toUpperCase() : char);
            });
            $scope.value = result.join("");
        };
    });

    // когда вы используете значение свойства определенного непосредственно в scope, то
    // Angular проверяет это локальное свойство или нет,
    // если нет, то он начинает искать его по иерархии наследования.
    // Если вы используете ng-model для изменения такого свойства,
    // то Angular проверяет есть ли оно локально и если нет, то неявно создается новое свойство,
    // это и есть причина ошибок в предыдущем примере
    app.controller("parentCtrl2", function ($scope) {
        $scope.dataObject = {
            value: "Hello"
        };
        // для того, чтобы избежать такого поведения при использовании ng-model
        // следует создать объект и работать с его свойством,
        // так как объекты JavaScript используют наследование прототипов
        // (технику похожую на ту, которую использует Angular при поиске свойства),
        // то в таком случае ошибку удается решить
        $scope.reverseText = function () {
            $scope.dataObject.value = $scope.dataObject.value.split("").reverse().join("");
        };
        $scope.changeCase = function () {
            var result = [];
            angular.forEach($scope.dataObject.value.split(""), function (char, index) {
                result.push(index % 2 == 1 ? char.toString().toUpperCase() : char.toString().toLowerCase());
            });
            $scope.dataObject.value = result.join("");
        };
    });
    app.controller("firstChildCtrl2", function ($scope) {
        $scope.changeCase = function () {
            $scope.dataObject.value = $scope.dataObject.value.toLowerCase();
        };
    });
    app.controller("secondChildCtrl2", function ($scope) {
        $scope.changeCase = function () {
            $scope.value = $scope.value.toLowerCase();
        };
        $scope.shiftFour = function () {
            var result = [];
            angular.forEach($scope.dataObject.value.split(""), function (char, index) {
                result.push(index < 4 ? char.toUpperCase() : char);
            });
            $scope.dataObject.value = result.join("");
        };
    });
}