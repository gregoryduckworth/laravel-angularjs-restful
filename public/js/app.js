var app = angular.module('todoApp', ['xeditable'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.run(function(editableOptions) {
  editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs2', 'default'
});

app.controller('todoController', function($scope, $http) {

    $scope.todos = [];
    $scope.loading = false;

    // Load
    $scope.init = function() {
        $scope.loading = true;
        $http.get('/api/todo').
        success(function(data, status, headers, config) {
            $scope.todos = data;
            $scope.loading = false;
        });
    }

    $scope.addTodo = function() {
        $scope.loading = true;

        $http.post('/api/todo', {
            title: $scope.todo.title,
            done: $scope.todo.done
        }).success(function(data, status, headers, config) {
            $scope.todos.push(data);
            $scope.todo = '';
            $scope.loading = false;
        });
    };

    $scope.updateTodo = function(todo) {
        $scope.loading = true;
        $http.put('/api/todo/' + todo.id, {
            title: todo.title,
            done: todo.done
        }).success(function(data, status, headers, config) {
            todo = data;
            $scope.init();
            $scope.loading = false;
        });
    };

    $scope.deleteTodo = function(index) {
        $scope.loading = true;

        var todo = $scope.todos[index];

        $http.delete('/api/todo/' + todo.id)
            .success(function() {
                $scope.todos.splice(index, 1);
                $scope.loading = false;
            });
    };


    $scope.init();

});
