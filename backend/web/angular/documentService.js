documentService();
function documentService()
{
    $('html').attr('ng-app', 'MyApp');
    var app = angular.module("MyApp", []);

    app.controller("documentServiceCtrl", function($scope, $window, $document) {
        $document.find("button").on("click", function (event) {
            $window.alert(event.target.innerHTML);
        })
    });
}