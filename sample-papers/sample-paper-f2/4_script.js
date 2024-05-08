var myAngularApp = angular.module("my_mod", [])

myAngularApp.controller("my_controller", function ($scope) {
    $scope.triesExceeded = false;
    // $scope.validUser = false;
    $scope.username = ['user1', 'user2', 'user3'];
    $scope.password = ['pass1', 'pass2', 'pass3'];
    $scope.tries = 0;

    $scope.validate = function(user) {
        $scope.validUser = false;

        console.log($scope.tries);

        for(let i = 0; i < $scope.username.length; i++) {

            if($scope.username[i] == user.name && $scope.password[i] == user.pass) {
                $scope.validUser = true;
                break;
            }
        }

        if($scope.validUser) {
            alert("Login success");
            
            user.name = "";
            user.pass = "";
            $scope.tries = 0;
            $scope.triesExceeded = false;
        }
        else {
            alert("Login failed");
            user.pass = "";
            
            $scope.tries++;
            if($scope.tries >= 3) {
                $scope.triesExceeded = true;
            }
        }
    }

})
