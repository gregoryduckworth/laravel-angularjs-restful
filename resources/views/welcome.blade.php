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
                    <button class="btn btn-primary btn-md"  ng-click="add()">Add</button>
                    <i ng-show="loading" class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <tr ng-repeat='todo in todos'>
                            <td><input type="checkbox" ng-true-value="1" ng-false-value="'0'" ng-model="todo.done" ng-change="update(todo)"></td>
                            <td><a href="#" editable-text="todo.title" onaftersave="update(todo)"><% todo.title || empty %></a></td>
                            <td><button class="btn btn-danger btn-xs" ng-click="delete(todo)">  <span class="glyphicon glyphicon-trash" ></span></button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <!--AngularJS-->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
    <!-- Or use TAG number for specific version. New versions are auto deployed -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.0/lodash.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/restangular/1.5.1/restangular.min.js"></script>
     <script src="js/xeditable.js"></script>
    <script src="js/app.js"></script>
</html>
