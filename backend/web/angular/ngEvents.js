ngEvents();
function ngEvents()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("ngEventsCtrl", function($scope, $http) {
        $scope.items = [
            { name: "ng-blur", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие blur которое срабатывает когда элемент теряет фокус" },
            { name: "ng-change", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие change которое срабатывает когда в элементе формы меняется значение" },
            { name: "ng-click", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие click которое срабатывает когда выполняется клик на элементе" },
            { name: "ng-copy", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие copy которое срабатывает при копировании" },
            { name: "ng-cut", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие cut которое срабатывает при вырезании" },
            { name: "ng-paste", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие paste которое срабатывает при вставке" },
            { name: "ng-dblclick", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие dblclick которое срабатывает при двойном клике по элементу" },
            { name: "ng-focus", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие focus которое срабатывает когда элемент получает фокус" },
            { name: "ng-keydown", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие keydown которое срабатывает когда клавиша опущена" },
            { name: "ng-keypress", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие keypress которое срабатывает после keydown" },
            { name: "ng-keyup", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие keyup которое срабатывает когда клавиша отпущена" },
            { name: "ng-mousedown", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие mouse-down которое срабатывает когда кнопка мыши нажата" },
            { name: "ng-mouseenter", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие mouse-enter которое срабатывает когда курсор попадает в определенную область" },
            { name: "ng-mouseleave", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие mouse-leave которое срабатывает когда курсор покидает область" },
            { name: "ng-mousemove", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие mouse-move которое срабатывает когда двигается курсор" },
            { name: "ng-mouseup", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие mouse-up которое срабатывает когда клавиша мыши отпущена" },
            { name: "ng-submit", apply: "Атрибут, класс", description: "Дает возможность AngularJS обработать событие submit которое срабатывает когда в элементе form была нажата кнопка Submit" }
        ];

        $scope.tasks = [
            { action: "Buy flowers", complete: false },
            { action: "Go to gym", complete: false },
            { action: "Buy snickers", complete: true },
            { action: "Buy notebook", complete: false },
            { action: "Call friends", complete: false },
            { action: "Go to cinema", complete: false },
            { action: "Buy Big-Mac", complete: true },
            { action: "Buy a book", complete: false },
            { action: "Call mom", complete: false }
        ];
        $scope.buttonNames = ["Red", "Green", "Blue"];
        $scope.data = {
            rowColor: "Blue",
            columnColor: "Green"
        };
        $scope.handleEvent = function (e) {
            console.log("Event type:" + e.type);
            $scope.data.columnColor = e.type == "mouseover" ? "Green" : "Blue";
        };
        $scope.message = "Hover me!";
    }).directive("tap", function () {
        return function (scope, elem, attrs) {
            elem.on("mouseenter", function () {
                // здесь используется метод jqLite on для того чтобы указать обработчик на события touchstart и touchend
                scope.$apply(attrs["tap"]);
                // scope.$apply(attrs["tap"]) используется для чтобы достать значение атрибута tap и применить его к scope
                // таким образом замещая значение свойства message
            }).on("mouseleave", function () {
                scope.$apply(attrs["focusout"]);
            });
            // с помощью выражения .directive можно создать пользовательскую директиву,
            // directive принимает 2 аргумента 1й это название директивы а второй фабричная функция
            // которая возвращает функцию принимающую 3 аргумента:scope - контекст в котором будет выполнятся функция,
            // elem - это jqLite представление элемента  к которому применена директива и
            // attrs - это коллекция атрибутов примененных к элементу
        }
    });;
}