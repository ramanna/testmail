var myApplication = angular.module('applicationAppOne', []);
myApplication.directive('ngFiles', ['$parse', function ($parse) {
        function fn_link(scope, element, attrs) {
            var onChange = $parse(attrs.ngFiles);
            element.on('change', function (event) {
                onChange(scope, {$files: event.target.files});
            });
        }
        ;
        return {
            link: fn_link
        };
    }]);

myApplication.controller('mailController', function ($scope, $http) {
    $scope.custom = false;
    $scope.compose = {};
    $scope.toggleCustom = function () {
        $scope.custom = true;
    };

    var formdata = new FormData();
    $scope.getTheFiles = function ($files) {
        angular.forEach($files, function (value, key) {
            formdata.append(key, value);
        });
    };

    $scope.sendMail = function ($type) {
        $scope.ok = true;
        $scope.loading = true;
        var request = {
            method: 'POST',
            url: '/mail/fileupload/',
            data: formdata,
            headers: {
                'Content-Type': undefined
            }
        };
        // SEND THE FILES.
        $http(request)
                .success(function (d) {
                    $http.post('/mail/addmail', {'title': $scope.compose.send_to_list, 'attachment': d, 'subject': $scope.compose.subject, 'msg_body':$("#msg_body").val(), 'type':$type}
                    ).success(function (data, status, headers, config) {
                        if (data.msg != '')
                        {
                            $scope.success =  data.msg;
                            $scope.ok = false;
                            $scope.compose = {};
                        } else
                        {
                            $scope.error = data.error;
                            $scope.ok = false;
                        }
                    }).error(function (data, status) { // called asynchronously if an error occurs
                        $scope.error = "Something went wrong.";
                        $scope.ok = false;
                        //$scope.loading = false;              
                    });
                }).error(function () {
            $scope.error = "Image Not Uploaded.";
            alert("error");
        });
    };

    $scope.discard = function () {
        window.location.reload();
    };

});