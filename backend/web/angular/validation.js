validation();
function validation()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("validationCtrl", function($scope, $http) {
        $scope.addNewUser = function (userDetails) {
            $scope.message = userDetails.name + " (" + userDetails.email + ") (" + userDetails.agreed + ")";
        }
        $scope.message = "Ready";
    });

    app.controller("validation2Ctrl", function($scope, $http) {
        $scope.addNewUser = function (userDetails) {
            $scope.message = userDetails.name + " (" + userDetails.email + ") (" + userDetails.agreed + ")";
        }
        $scope.message = "Ready";
    });

    app.controller("validation3Ctrl", function($scope, $http) {
        $scope.addNewUser = function (userDetails) {
            $scope.message = userDetails.name + " (" + userDetails.email + ") (" + userDetails.agreed + ")";
        }
        $scope.message = "Ready";
    });

    app.controller("validation4Ctrl", function($scope, $http) {
        $scope.addNewUser = function (userDetails) {
            $scope.message = userDetails.name + " (" + userDetails.email + ") (" + userDetails.agreed + ")";
        }
        $scope.message = "Ready";
    });

    app.controller("validation5Ctrl", function($scope, $http) {
        $scope.addNewUser = function (userDetails) {
            $scope.message = userDetails.name + " (" + userDetails.email + ") (" + userDetails.agreed + ")";
        };
        $scope.message = "Ready";
        $scope.getError = function (error) {
            if (angular.isDefined(error)) {
                // объект, который здесь ожидается получить - error, но он будет сформирован
                // только тогда когда будет допущена хотя бы одна ошибка валидации,
                // а пока их нет он undefined и для того, чтобы избежать ошибки нужно использовать проверку
                if (error.required) {
                    return "Please enter a value";
                } else if (error.email) {
                    return "Please enter a valid email address";
                }
            }
        };
        // в данном примере для упрощения реализации вспомогательных сообщений
        // об ошибках логика формирования текста ошибки
        // вынесена в отдельный метод так как для многих элементов управления текст ошибки будет похож, то
        // нет смысла дублировать его в каждом элементе разметки
    });

    app.controller("validation6Ctrl", function($scope, $http) {
        $scope.addNewUser = function (userDetails) {
            if (myForm.$valid) {
                $scope.message = userDetails.name + " (" + userDetails.email + ") (" + userDetails.agreed + ")";
            } else {
                $scope.showValidation = true;
            }
        };
        $scope.message = "Ready";
        $scope.getError = function (error) {
            if (angular.isDefined(error)) {
                if (error.required) {
                    return "Please enter a value";
                } else if (error.email) {
                    return "Please enter a valid email address";
                }
            }
        };
    });
}