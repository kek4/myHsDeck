var app = angular.module('app', ['ui.bootstrap']);

// config scope in blade
app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('#{').endSymbol('}#');
});
