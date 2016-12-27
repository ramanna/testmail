var myApplication = angular.module('applicationAppOne', []);
myApplication.controller('userController', function ($scope, $http) {

   $scope.login = function() { 
       console.log($scope.login);
       if($scope.login.email==""){
           $scope.errorLoginError = 'Invalid Credentials';
       }
       $http.post("/user/logindata",{'email':$scope.login.email,'password':$scope.login.password}).success(function (response) {
            if(response==1){
                window.location.href = '/mail/inbox';
                return false;
            }
            $scope.errorLoginError = 'Invalid Credentials';
       });
   };
   
});
        