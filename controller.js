
var app = angular.module('capitalSearch', []);
app.controller('capitalCtrl', function($scope, $http) {
    $scope.getCapital = function () {
        var searchValue = document.getElementById("searchField");
        var search = searchValue.value
        $http.get("search.php?state=" + search)
        .then(function (response) {$scope.states = response.data.records;});
    }    
});