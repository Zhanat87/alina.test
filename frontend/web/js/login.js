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
                                    setErrorsForFormElement('usernameInput');
                                    break;
                                case 'password' :
                                    setErrorsForFormElement('passwordInput');
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