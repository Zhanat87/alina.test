<!DOCTYPE html>
<html ng-app="todoApp">
<head lang="en">
    <meta charset="UTF-8">
    <title>TO DO List</title>
    <link rel="stylesheet" href="/pro_angularjs/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="/pro_angularjs/bootstrap/dist/css/bootstrap-theme.css"/>
    <script src="/pro_angularjs/angular/angular.min.js"></script>
    <script src="/pro_angularjs/app/todo.js"></script>
</head>
<body ng-controller="ToDoCtrl">
<div class="col-md-6">
    <div class="page-header">
        <h1>
            {{todo.user}}'s To Do List
            <span class="label label-default"
                  ng-class="warningLevel()"
                  ng-hide="incompleteCount() === 0">{{incompleteCount()}}</span>
        </h1>
    </div>
    <div class="panel">
        <form action="#" name="todoForm">
            <div class="input-group">
                <input class="form-control actionInput" required ng-model="actionText"/>
                <span class="input-group-btn">
                    <button class="btn btn-default" ng-click="addNewItem(actionText)" ng-disabled="todoForm.$invalid">
                        Add
                    </button>
                </span>
            </div>
        </form>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Description</th>
                <th>Done</th>
                <th>Done</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="item in todo.items | checkedItems:showComplete | orderBy:'action'">
                <td>{{item.action}}</td>
                <td><input type="checkbox" ng-model="item.done"/></td>
                <td>{{item.done | boolToString}}</td>
                <td>
                    <button class="btn btn-danger" ng-click="removeItem(item._id.$id)">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="checkbox-inline">
            <label><input type="checkbox" ng-model="showComplete"> Show Complete</label>
        </div>
    </div>
</div>
</body>
</html>