var model = {
    user: "Someone"
};

var todoApp = angular.module('todoApp', []);

todoApp.run(function($http) {
    $http.get('/angular/todo/list').success(function(data) {
        model.items = data;
    });
});

todoApp.controller('ToDoCtrl', function ($scope, $http) {
    $scope.todo = model;

    $scope.incompleteCount = function() {
        var count = 0;
        angular.forEach($scope.todo.items, function(item) {
            if(!item.done) { count++; }
        });
        return count;
    };

    $scope.warningLevel = function() {
        return $scope.incompleteCount() < 3 ? 'label-success' : 'label-warning';
    };

    $scope.addNewItem = function(actionText) {
        $http.post('/angular/todo/add', {action : actionText})
            .success(function(data, status, headers, config) {
                console.info(data);
                if (data.code == 200) {
                    $scope.todo.items.push({ action: actionText, done: false });
                    $scope.actionText = null;
                } else if (data.code == 400) {
                    for (var i in data.errors) {
                        switch (i) {
                            case 'action' :
                                setErrorsForFormElement('actionInput');
                                break;
                        }
                    }
                }
            })
            .error(function(data, status, headers, config) {
                //console.log("error data: " + data);
                console.log("код ответа: " + status);
            });
    };

    $scope.removeItem = function(itemId) {
        $http.post('/angular/todo/remove', {_id : itemId})
            .success(function(data, status, headers, config) {
                if (data.code == 200) {
                    var results = []
                    angular.forEach($scope.todo.items, function(item) {
                        if(item._id.$id != itemId) {
                            results.push(item);
                        }
                    });
                    $scope.todo.items = results;
                } else if (data.code == 400) {
                    console.log("error data: " + data);
                }
            })
            .error(function(data, status, headers, config) {
                console.log("код ответа: " + status);
            });
    };
});

todoApp.filter('boolToString', function() {
    return function(bool) {
        return bool ? 'Yes' : 'No';
    };
});

todoApp.filter('checkedItems', function() {
    return function(items, showComplete) {
        if(showComplete) {
            return items;
        }
        else {
            var results = []
            angular.forEach(items, function(item) {
                if(!item.done) {
                    results.push(item);
                }
            });
            return results;
        }
    }
});