login();
function login()
{
    var app = angular.module("MyApp", []);
    app.config(getAjaxConfig()).controller('loginCtrl', function ($scope, $http) {
        $scope.login = function (user) {
            $('.usernameInput, .passwordInput').removeClass('ngDirty');
            $('.pError').remove();
            $http.post('/site/login-ajax', user)
                .success(function(data, status, headers, config) {
                    console.info(data);
                    if (data.code == 200) {
                        window.location.href = '/';
                    } else if (data.code == 400) {
                        for (var i in data.errors) {
                            switch (i) {
                                case 'username' :
                                    var errors = '';
                                    for (var k in data.errors[i]) {
                                        errors += '<p class="ngInvalid pError">' + data.errors[i][k] + '</p>';
                                    }
                                    $('.usernameInput').removeClass('ng-valid').addClass('ngDirty').after(errors);
                                    break;
                                case 'password' :
                                    var errors = '';
                                    for (var k in data.errors[i]) {
                                        errors += '<p class="ngInvalid pError">' + data.errors[i][k] + '</p>';
                                    }
                                    $('.passwordInput').removeClass('ng-valid').addClass('ngDirty').after(errors);
                                    break;
                            }
                        }
                    }
                })
                .error(function(data, status, headers, config) {
                    //console.log("error data: " + data);
                    console.log("код ответа: " + status);
                });
        }
    });
}