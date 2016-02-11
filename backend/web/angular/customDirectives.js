customDirectives();
function customDirectives()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.directive("orderedList", function () {
        // для создания директивы следует использовать метод directive,
        // который принимает 2 аргумента: 1) имя директивы; 2) фабричная функция
        return function (scope, element, attributes) {
            // такая worker функция называется ссылочной функцией - это означает,
            // что она связывает директиву в разметке с данными из scope.
            // эта функция будет вызванана когда angularjs создает экземпляры директивы и передает туда 3 аргумента:
            // 1) scope для view, к которому применена директива;
            // 2) HTML элемент, к которому будет применена директива;
            // 3) атрибуты HTML элемента, к которому применена директива
            // эти аргументы не предоставляются Dependency Injection
            // это стандартные аргументы JavaScript поэтому их порядок важен
            var data = scope[attributes["orderedList"]];
            // благодаря attributes можно получить атрибуты из разметки,
            // далее атрибут передается в scope для получения его значения
            if (angular.isArray(data)) {
                var elem = angular.element("<ol>");
                // метод element, который является оберткой над функционалом jqlite
                // (фактически возвращает jqLite объектб с помощью которого можно
                // получить доступ к другим методам jqLite)
                // здесь c его помощью мы создаем элемент ol
                element.append(elem);
                // так как атрибут element представляет HTML элемент, к которому применена директива,
                // то на нем доступен метод append, который позволяет вставить новый элемент разметки
                for (var i = 0; i < data.length; i++) {
                    elem.append(angular.element('<li>').html(data[i].itemName + ' $<b>' + data[i].itemPrice + '</b>'));
                }
            }
        }
    }).directive("orderedListSecond", function () {
            return function (scope, element, attributes) {
                var data = scope[attributes["orderedListSecond"]];
                var prop = attributes["customProperty"];
                // так как в аргументе attributes присутствуют все атрибуты, которые применены к элементу разметки,
                // то можно получить и значение атрибута, в котором указано
                // свойство, из которого нужно взять данные для отображения
                if (angular.isArray(data)) {
                    var elem = angular.element("<ol>");
                    element.append(elem);
                    for (var i = 0; i < data.length; i++) {
                        elem.append(angular.element('<li>').text(data[i][prop]));
                    }
                }
            }
    }).directive("orderedListThird", function () {
            return function (scope, element, attributes) {
                var data = scope[attributes["orderedListThird"]];
                var expression = attributes["customProperty"];
                if (angular.isArray(data)) {
                    var elem = angular.element("<ol>");
                    element.append(elem);
                    for (var i = 0; i < data.length; i++) {
                        elem.append(angular.element('<li>').text(scope.$eval(expression, data[i])));
                        // метод scope.$eval([expression], [locals]) - применяет к текущему scope
                        // expression и возвращает результат, аргументы:
                        // 1) [expression] - выражение, которое нужно выполнить
                        // 2) объект - который, содержит переменные для переопределения значений в scope
                        // здесь в метод мы передаем содержимое атрибута и объект со свойствами
                        // и если для свойства есть данные из объекта, то он их применяет.
                        // таким образом мы не затрагиваем фильтр
                    }
                }
            }
    }).directive("orderedListFourth", function () {
            return function (scope, element, attributes) {
                var data = scope[attributes["orderedListFourth"]];
                var expression = attributes["customProperty"];
                if (angular.isArray(data)) {
                    var elem = angular.element("<ul>");
                    element.append(elem);
                    for (var i = 0; i < data.length; i++) {
                        (function () {
                            var itemElem = angular.element('<li>');
                            elem.append(itemElem);
                            var index = i;
                            var watcherFunction = function (watchScope) {
                                return watchScope.$eval(expression, data[index]);
                            }
                            scope.$watch(watcherFunction, function (newValue, oldValue) {
                                // функция $watch будет наблюдать за изменениями данных в scope и если они изменятся,
                                // то будет вызвана функция watcherFunction и ей в качестве аргумента будет передан scope.
                                // далее функция формирует данные для отображения и возвращает их, далее они попадают
                                // в функцию callback в качестве первого аргумента newValue
                                itemElem.text(newValue);
                                // при изменении данных будет срабатывать функция $watch.
                                // а первый раз данные инициализируются когда будет применена директива
                            });
                        }()); // сделано для избегания замыкания, из-за которого данный пример не работает
                    }
                }
            }
    }).controller("customDirectivesCtrl", function($scope, $http) {
        $scope.items = [
            { itemName: "Table", itemPrice: 44.10 },
            { itemName: "Chair", itemPrice: 21.20 },
            { itemName: "Pillow", itemPrice: 12.20 },
            { itemName: "Picture", itemPrice: 112.70 },
            { itemName: "Lamp", itemPrice: 28.31 }
        ];
        $scope.changePrices = function () {
            for (var i = 0; i < $scope.items.length; i++) {
                $scope.items[i].itemPrice++;
            }
        }
    });
}