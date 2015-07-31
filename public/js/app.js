var app = angular.module('todoApp', ['xeditable', 'restangular'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.run(function(editableOptions) {
  editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
});

app.controller('todoController', function($scope, Restangular) {

    var Todos = Restangular.all('/api/todos');

    // This will query /todos and return a promise.
    Todos.getList().then(function(todos) {
      $scope.todos = todos;
      $scope.todo = '';
    });

    $scope.add = function(){
        Todos.post($scope.todo).then(function(todo){
            $scope.todos.push(todo);
        });
        $scope.todo = '';
    }

    $scope.update = function(todo){
        $scope.todo = Restangular.copy(todo);
        $scope.todo.put($scope.todo);
        $scope.todo = '';
    }

    $scope.delete = function(todo){
        todo.remove().then(function() {
            // a better solution, suggested by Restangular themselves
            // see https://github.com/mgonto/restangular#removing-an-element-from-a-collection-keeping-the-collection-restangularized
            var index = $scope.todos.indexOf(todo);
            if (index > -1) $scope.todos.splice(index, 1);
       });
    }
});
