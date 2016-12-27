<div class="mainContentIn">
    <div class="customTabbed">
        <a class="active" href="#/settings">MY PROFILE</a>
        <a href="#/security">SECURITY</a>
        <a ng-click="getVerificationDetails()" href="#/verification">VERIFICATION</a>
        <a ng-click="getBankDetails()" href="#/bankaccounts">BANK ACCOUNTS</a>
    </div>
    <div class="col-md-12">
        <div ng-class="success ? 'successNew top10' : ''" ng-hide="showClose" class="msgInfo">
            <p class="msgOnly">{{success}}</p>
            <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
        </div>
        <div ng-class="error ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
            <p class="msgOnly">{{error}}</p>
            <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
        </div>
    </div>
    <form name="user.profileForm" ng-submit="user.profileForm.$valid" novalidate ng-show="profileOne">
        <div class="TabbedContent tab-content twoColumns clearfix">
            <div class="profileForm form-group">
                <div class="col-md-6">
                    <span class="input input--hoshi" ng-class="myDynamicClass">
                        <input class="input__field input__field--hoshi" type="text" ng-pattern="/^[a-zA-Z0-9 ]+$/" ng-trim="false" ng-model="user.fullname" name="fullname" required/>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                            <span class="input__label-content input__label-content--hoshi">Full Name</span>
                        </label>
                        <div ng-show="user.profileForm.$submitted || user.profileForm.fullname.$touched">      
                            <div class="errorMsg" ng-show="user.profileForm.fullname.$error.required">Please Enter Full Name.</div>   
                            <div class="errorMsg" ng-show="user.profileForm.fullname.$error.pattern">Invalid Full Name.</div>   
                        </div>
                    </span>
                </div>
                <div class="col-md-6 datePickerCustom">
                    <datepicker
                        date-format="yyyy-M-dd"
                        date-min-limit=""
                        date-max-limit="{{currentDate.toString()}}"
                        button-prev='<i class="fa fa-arrow-circle-left"></i>'
                        button-next='<i class="fa fa-arrow-circle-right"></i>'>
                        <input ng-model="user.date1" placeholder="DOB" class="angular-datepicker-input"  type="text" name="dob" ng-readonly="true" required/>
                    </datepicker>
                    <div ng-show="user.profileForm.$submitted || user.profileForm.dob.$touched">      
                        <div class="errorMsg" ng-show="user.profileForm.dob.$error.required">Please Select DOB.</div>   
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="input input--hoshi" ng-class="myEmailClass">
                        <input class="input__field input__field--hoshi" ng-pattern="/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/" type="text" ng-model="user.email" ng-blur="checkemailpresentornot()" name="email" ng-readonly="emailVerified == 'VERIFIED' ? true : false" required/>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                            <span class="input__label-content input__label-content--hoshi">Email</span>
                        </label>
                        <div ng-show="user.profileForm.$submitted || user.profileForm.email.$touched">      
                            <div class="errorMsg" ng-show="user.profileForm.email.$error.required">Please Enter Email.</div>   
                            <div class="errorMsg" ng-show="user.profileForm.email.$error.pattern">Invalid Email.</div>   
                            <div class="errorMsg" ng-show="user.profileForm.email.$error.emailpresent">EmailId Already Present.</div>   
                        </div>
                    </span>
                </div>
                <div class="col-md-6 citizenShip">
                    <select class="form-control" name="citizenship" ng-model="user.citizenship" required>
                        <option value=''>- Please Choose Citizenship -</option>
                        <option 
                            ng-repeat="country in countrynameJson"
                            value="{{country.id}}">
                            {{country.name}}
                        </option>
                    </select>
                    <div ng-show="user.profileForm.$submitted || user.profileForm.citizenship.$touched">      
                        <div class="errorMsg" ng-show="user.profileForm.citizenship.$error.required">Please Select Citizenship.</div>   
                    </div>
                </div>
                <div class="col-md-6 country">
                    <select class="form-control" name="country" ng-model="user.country" ng-change="getCode()" required>
                        <option value=''>- Please Choose Country -</option>
                        <option 
                            ng-repeat="country in countrynameJson"
                            value="{{country.id}}">
                            {{country.name}}
                        </option>
                    </select>
                    <div ng-show="user.profileForm.$submitted || user.profileForm.country.$touched">      
                        <div class="errorMsg" ng-show="user.profileForm.country.$error.required">Please Select Country.</div>   
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="phoneSection clearfix">
                        <div class="col-md-4 col-xs-3 padding-left0">
                            <span class="input input--hoshi" ng-class="myCodeClass">
                                <input class="input__field input__field--hoshi" type="text" name="phonecode" ng-model="user.phonecode" ng-readonly="phonec" required/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                    <span class="input__label-content input__label-content--hoshi">Code</span>
                                </label>
                            </span>
                        </div>
                        <div class="col-md-8 col-xs-9 padding-right0">
                            <span class="input input--hoshi" ng-class="myPhoneClass">
                                <input class="input__field input__field--hoshi"  ng-pattern="/^\d{6,15}$/" ng-trim="false" type="text" maxlength="15" name="phonenumber" ng-blur="checkphonepresentornot()" ng-model="user.phonenumber" ng-readonly="userprofileVerified == 'VERIFIED' ? true : false" required/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                    <span class="input__label-content input__label-content--hoshi">Phone</span>
                                </label>
                                <div ng-show="user.profileForm.$submitted || user.profileForm.phonenumber.$touched">      
                                    <div class="errorMsg" ng-show="user.profileForm.phonenumber.$error.required">Please Enter Mobile Number.</div> 
                                    <div class="errorMsg" ng-show="user.profileForm.phonenumber.$error.pattern">Invalid Phone Number</div>
                                    <div class="errorMsg" ng-show="user.profileForm.phonenumber.$error.phonepresent">Phone Number Already Present.</div>
                                </div>
                            </span>
                            <small class="pull-right smallTxt">Min 6 and Max 15 digits.</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="zipCodeProfile">
                        <span class="input input--hoshi" ng-class="myZipClass">
                            <input class="input__field input__field--hoshi" ng-pattern="/^[a-zA-Z0-9]*$/"  ng-trim="false" type="text" name="zip" ng-model="user.zip" required/>
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                <span class="input__label-content input__label-content--hoshi">ZIP</span>
                            </label>
                            <div ng-show="user.profileForm.$submitted || user.profileForm.zip.$touched">      
                                <div class="errorMsg" ng-show="user.profileForm.zip.$error.required">Please Enter zip.</div> 
                                <div class="errorMsg" ng-show="user.profileForm.zip.$error.pattern">Invalid Zip Code.</div>  
                            </div>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="input input--hoshi" ng-class="myAddressClass">
                        <textarea class="input__field input__field--hoshi" maxlength="150" ng-maxlength="150"  ng-trim="false" ng-change="showcharLeft()" name="address" ng-model="user.address" ng-readonly="addressVerified == 'APPROVED' ? true : false" required></textarea>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                            <span class="input__label-content input__label-content--hoshi">Address</span>
                        </label>
                        <div ng-show="user.profileForm.$submitted || user.profileForm.address.$touched">      
                            <div class="errorMsg" ng-show="user.profileForm.address.$error.required">Please Enter Address.</div>   
                            <div class="errorMsg" ng-show="user.profileForm.address.$error.maxlength">Maximum 150 Char.</div>   
                        </div>
                    </span>
                    <small class="pull-right smallTxt">Max 150 Character<span ng-show="charLeft">, {{150 - user.address.length}} left</span></small>
                    <input type="submit" ng-click="user.profileForm.$valid ? updateProfile() : ''" value="{{profilebtn}}"  class="btn btn-default btn-block btn-submit top10">
                </div>
            </div>
        </div>
    </form>
    <form name="userprofile.otpForm" ng-submit="userprofile.otpForm.$valid" novalidate ng-show="profileTwo">
        <div class="col-md-12">
            <div ng-class="otpSuccess ? 'successNew top10' : ''" ng-hide="showClose" class="msgInfo">
                <p class="msgOnly">{{otpSuccess}}</p>
                <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
            </div>
            <div ng-class="errorotp ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
                <p class="msgOnly">{{errorotp}}</p>
                <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
            </div>
          <div class="col-md-6 profileOTPBlock col-md-offset-3">
            <p>You will receive a OTP over SMS and enter it to Verify.</p>
            <span class="input input--hoshi " >
            <input class="input__field input__field--hoshi" type="text" ng-model="userprofile.profileotp" maxlength="5" ng-change="profilecheckotp()" name="profileotp" required/>
            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                <span class="input__label-content input__label-content--hoshi">Enter OTP*</span>
            </label>
        </span>
        <div class="error otpError" ng-show="userprofile.otpForm.$submitted || userprofile.otpForm.profileotp.$touched">      
            <span class="error" ng-show="userprofile.otpForm.profileotp.$error.required">Please Enter OTP.</span>   
            <span class="error" ng-show="userprofile.otpForm.profileotp.$error.invalidOtp">Please Enter Correct OTP.</span>
        </div>
        <input class="btn margin-left15 pull-right greenBtn" ng-click="verifyprofileotp()" value="Verify OTP" type="submit" />
        <a class="btn margin-left15 pull-right greenBtn" ng-if="countDown < 0" ng-click="resendProfileotp()" href="javascript:void(0)">{{resend}}</a>
        <input ng-model="countDown" ng-show="timer" class="otptimer" ng-readonly="true"/>
          </div>
        </div>
        
        
    </form>
</div>
