//'use strict';
//var myApplication = angular.module('applicationAppOne', ['ngRoute','ngCkeditor']);
///*myApplication.config(['$routeProvider',
//    function (
//            $routeProvider
//            ) {
//        $routeProvider.
//                when('/mail-compose', {
//                    templateUrl: '/mail/compose',
//                    controller: 'mailController'
//                }).
//                when('/mail-sent', {
//                    templateUrl: '/mail/sent',
//                    controller: 'mailController'
//                }).
//                when('/mail-draft', {
//                    templateUrl: '/mail/draft',
//                    controller: 'mailController'
//                }).
//                when('/mail-trash', {
//                    templateUrl: '/mail/trash',
//                    controller: 'mailController'
//                }).
//
//                otherwise({
//                    templateUrl: '/user/login',
//                    controller: 'loginController'
//                });
//    }]);
//
//myApplication.directive('ckEditor', function () {
//    return {
//        require: '?ngModel',
//        link: function (scope, elm, attr, ngModel) {
//            var ck = CKEDITOR.replace(elm[0]);
//            if (!ngModel) return;
//            ck.on('instanceReady', function () {
//                ck.setData(ngModel.$viewValue);
//            });
//            function updateModel() {
//                scope.$apply(function () {
//                ngModel.$setViewValue(ck.getData());
//            });
//        }
//        ck.on('change', updateModel);
//        ck.on('key', updateModel);
//        ck.on('dataReady', updateModel);
//
//        ngModel.$render = function (value) {
//            ck.setData(ngModel.$viewValue);
//        };
//    }
//}});
//*/
// 
//myApplication.controller('loginController', function () {
//   alert("login"); 
//});
////myApplication.controller('mailController', function () {
////   alert("mailController"); 
////});
////
////myApplication.controller('loginController', ['$scope', '$http', function ($scope, $http) {
////        $http.get("/user/isuserloggedin").success(function (loggedin) {
////            if (loggedin > 0) {
////                window.location = '/main#/inbox';
////            }
////        });
////
////        $scope.subval = "Login";
////        $scope.headingText = "Login";
////        $scope.loginone = true;
////        $scope.logintwo = false;
////        $("#login_form").validate({
////            onfocusout: function (element) {
////                this.element(element);
////            },
////            rules: {
////                email: {
////                    required: true,
////                    eitherEmailPhone: true
////                },
////                password: {
////                    required: true,
////                    minlength: 5,
////                    nowhitespace: true
////                }
////            },
////            messages: {
////                email: {
////                    required: "Please enter EmailId / Phone",
////                    email: "Invalid Email"
////                },
////                password: {
////                    required: "Please enter Password",
////                    minlength: "Min 5 character",
////                    nowhitespace: "Invalid Password"
////                }
////            }
////        });
////
////        $scope.Login = function () {
////            if ($('#login_form').valid()) {
////                $scope.ok = true;
////                $scope.subval = "Processing..";
////                $http.post('/user/logindata', {'email': $scope.email, 'password': $scope.password}
////                ).success(function (data) {
////                    $scope.subval = "Login";
////                    if (data.msg != '' && data.msg != undefined) {
////                        $scope.ok = false;
////                        window.location = '/dashboard#/dashboard';
////                    } else {
////                        if (data.error == "Please Verify Your Mobile") {
////                            $scope.subval = "Processing..";
////                            window.location = '/user/checkmobile?id=' + data.id;
////                        } else {
////                            if (data.email && data.email != "") {
////                                smartIdentification(data);
////                            } else {
////                                $scope.error = data.error;
////                                $scope.ok = false;
////                            }
////                        }
////                    }
////                }).error(function (data, status) {
////                    $scope.error = "Something went wrong...!";
////                    $scope.ok = false;
////                });
////            }
////        };
////    }]);
//
//
