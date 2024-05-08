var app = angular.module("chat-app", [])

app.controller("chat-controller", function($scope) {
    $scope.msg;
    $scope.room;
    $scope.type;
    $scope.user = prompt("Enter username : ");
    $scope.roomMessages = [];
    $scope.messages = [
        {
            'username' : 'User1',
            'timestamp' : new Date().toDateString() + "  " + new Date().toLocaleTimeString(),
            'message' : 'Hello in general',
            'room' : 'general'
        },
        {
            'username' : 'User1',
            'timestamp' : new Date().toDateString() + "  " + new Date().toLocaleTimeString(),
            'message' : 'Hello in games',
            'room' : 'games'
        },
        {
            'username' : 'User1',
            'timestamp' : new Date().toDateString() + "  " + new Date().toLocaleTimeString(),
            'message' : 'Hello in coding',
            'room' : 'coding'
        },
    ];

    $scope.roomSelected = function() {
        renderMessages();
    }

    $scope.insertMsg = function() {
        msg = {
            username : $scope.user,
            timestamp : new Date().toDateString() + "  " + new Date().toLocaleTimeString(),
            message : $scope.msg,
            room : $scope.room
        }

        $scope.messages.push(msg);
        $scope.msg = "";
        renderMessages();
    }

    $scope.orderMsg = function() {

    }

    function renderMessages() {
        $scope.roomMessages = [];
        for(let i = 0; i < $scope.messages.length; i++) {
            if($scope.messages[i].room == $scope.room) {
                $scope.roomMessages.push($scope.messages[i])
            }
        }

        return $scope.roomMessages;
    }

})
