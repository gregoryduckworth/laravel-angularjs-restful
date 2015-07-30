<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/xeditable.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container" ng-app="todoApp" ng-controller="todoController">
            <h1>TodoApp index view</h1>
            <div class="row">
                <div class="col-md-12 form-inline">
                    <input type='text' ng-model="todo.title" class="form-control">
                    <button class="btn btn-primary btn-md"  ng-click="addTodo()">Add</button>
                    <i ng-show="loading" class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <tr ng-repeat='todo in todos'>
                            <td><input type="checkbox" ng-true-value="1" ng-false-value="'0'" ng-model="todo.done" ng-change="updateTodo(todo)"></td>
                            <td><a href="#" editable-text="todo.title" onaftersave="updateTodo(todo)"><% todo.title || empty %></a></td>
                            <td><button class="btn btn-danger btn-xs" ng-click="deleteTodo($index)">  <span class="glyphicon glyphicon-trash" ></span></button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <!--AngularJS-->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
    <script src="js/xeditable.js"></script>
    <script src="js/app.js"></script>
</html>
