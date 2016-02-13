contact();
function contact()
{
    var app = angular.module("MyApp", []);
    app.config(getAjaxConfig()).controller('contactCtrl', function ($scope, $http) {
        $scope.notYetSendEmail = true;
        $scope.sendForm = function (contact) {
            $('.nameInput, .emailInput, .subjectInput, .bodyTextarea').removeClass('ngDirty');
            $('.pError').remove();
            $http.post('/site/contact-ajax', contact)
                .success(function(data, status, headers, config) {
                    console.info(data);
                    if (data.code == 200) {
                        $scope.notYetSendEmail = false;
                    } else if (data.code == 400) {
                        for (var i in data.errors) {
                            switch (i) {
                                case 'name' :
                                case 'email' :
                                case 'subject' :
                                    setErrorsForFormElement(i + 'Input');
                                    break;
                                case 'body' :
                                    setErrorsForFormElement('bodyTextarea');
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