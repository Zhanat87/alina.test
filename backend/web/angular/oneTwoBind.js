oneTwoBind();
function oneTwoBind()
{
    $('html').attr('ng-app', 'studyModule');
    angular.module("studyModule", [])
        .controller("studyCtrl", function ($scope) {
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
        });
}