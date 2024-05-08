var app = angular.module("MainModule", ['ngRoute'])

app.config(function($routeProvider) {
    $routeProvider
        .when('/home', {
            templateUrl:"views/home.html",
            controller: "homeCtrl"
        })
        .when('/login', {
            templateUrl:"views/login.html",
            controller: "loginCtrl"
        })
        .when('/register', {
            templateUrl:"views/register.html",
            controller: "registerCtrl"
        })
        .when('/payment', {
            templateUrl:"views/payment.html",
            controller: "paymentCtrl"
        })
        .when('/', {
            redirectTo:"/home"
        })
        .otherwise({
            template: "<h1>Not Found</h1>"
        })
})

app.controller("loginCtrl", function($scope, $location) {
    $scope.error = false;

    $scope.users = localStorage.getItem('users');
    $scope.user = localStorage.getItem('user');
    
    if($scope.user != null) {
        $location.path('/home')
    }
    if($scope.users == null) {
        $scope.users = [];
    }
    else {
        $scope.users = JSON.parse($scope.users);
    }

    $scope.login = function(user) {

        $scope.logInUser = $scope.users.find(
            u =>  u.email === user.email && u.password === user.password
        );

        console.log($scope.logInUser);
        if($scope.logInUser == null) {
            $scope.error = true;
        }
        else {
            $scope.user = JSON.stringify($scope.logInUser);

            localStorage.setItem('user', $scope.user);

            location.reload();
        }
    }
})

app.controller("registerCtrl", function($scope, $location) {
    $scope.users = localStorage.getItem('users');
    $scope.user = localStorage.getItem('user');
    
    if($scope.user != null) {
        $location.path('/home')
    }

    if($scope.users == null) {
        $scope.users = [];
    }
    else {
        $scope.users = JSON.parse($scope.users);
    }

    $scope.register = function(user) {
        console.log(user);
        $scope.users.push(user);
        
        $scope.users = JSON.stringify($scope.users);
        localStorage.setItem('users', $scope.users);
        
        
        console.log($scope.users);

        location.reload();
    }
})

app.controller('headerCtrl', function($scope, $location) {
    $scope.title = "Insurance App";
    $scope.loginStatus = false;

    $scope.user = localStorage.getItem('user');

    if($scope.user) {
        $scope.user = JSON.parse($scope.user);
        $scope.loginStatus = true;
    }

    $scope.logout = function() {
        localStorage.removeItem('user');
        $location.path('/login');
        location.reload();
    }

})

app.controller('homeCtrl', function($scope, $location) {

    $scope.user = localStorage.getItem('user');

    if(!$scope.user) {
        $location.path('/login');
    }

    $scope.payment = function(type) {
        console.log(type);
        localStorage.setItem('type', type);
        $location.path('/payment');
    }

})

app.controller('paymentCtrl', function($scope, $location) {
    $scope.type = localStorage.getItem("type");
    $scope.user = localStorage.getItem("user");
    $scope.user = JSON.parse($scope.user);

    $scope.proceed = function() {
        alert(`Thanks ${$scope.user.name} for buying ${$scope.type} Product . Payment successful.`);
        localStorage.removeItem("type");
        $location.path('/home');
    }
})
