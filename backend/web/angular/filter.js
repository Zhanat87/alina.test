filter();
function filter()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("filterCtrl", function($scope, $http) {
        $scope.tasks = [
            { action: "Buy flowers", complete: false },
            { action: "Go to gym", complete: false },
            { action: "Buy snickers", complete: true },
            { action: "Buy notebook", complete: false },
            { action: "Call friends", complete: false },
            { action: "Go to cinema", complete: false },
            { action: "Buy Big-Mac", complete: true },
            { action: "Buy a book", complete: false },
            { action: "Call mom", complete: false },
            { action: "Go to gym", complete: true }
        ];

        $scope.addTask = function (newTask) {
            if (angular.isDefined(newTask) && angular.isDefined(newTask.action) && angular.isDefined(newTask.Priority)) {
                // в данном случае проверка angular.isDefined(newTask) необходима в том случае,
                // если пользователь ничего не укажет и просто нажмет на кнопку
                // В консоли можно будет заметить ошибку которая связана с тем,
                // что newTask - undefined и мы пытаемся проверить его свойства
                // в свою очередь newTask undefined потому, что ни в один input не было
                // введено значение и angular не создал объект
                // angular.isDefined(newTask.action) и angular.isDefined(newTask.Priority)
                // отвечают за проверку свойств объекта newTask
                $scope.tasks.push({
                    action: newTask.action + " ( Priority: " + newTask.Priority + ")",
                    complete: false
                });
            };
            // метод addTask используется для создания новой задачи и добавления ее в список задач
        };
    });
}