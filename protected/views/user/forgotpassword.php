<div class="login-div">
    <div class="container login-container top60 bottom95">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="userprofilesuccess" ng-class="success ? 'alert alert-success text-center displayBlock' : 'displayNone'" class="">
                    {{success}}
                </div>
                <div id="userprofilesuccess" ng-class="error ? 'alert alert-danger text-center displayBlock' : 'displayNone'" class="">
                    {{error}}
                </div>
                <div class="login-white width95 forgotpassword portlet box green exchange-box buy-relative">
                    <div class="portlet-title">
                        <div class="caption text-center">
                            Forgot Password
                        </div>                               
                    </div>
                    <div class="portlet-body form border-form">
                        <div id="wrapper">                         
                            <div class="text_block">
                                <div class="login-full-width">                            
                                    <form id="forgot_password" name="forgot_password" ng-show="forgotone">
                                        <div class="form-group bottom55">
                                            <label>Email / Phone*</label>
                                            <input class="form-control login-input" type="text" name="email" ng-model="email" placeholder="Enter your email id">
                                            <div class="margin-top-10">
                                                <a class="btn login-cancel margin-right5" href="#/login">Cancel</a> 
                                                <input class="btn login-submit pull-right" type="submit" ng-click="forgotPassword();" value="{{subval}}" />
                                            </div>
                                        </div>
                                    </form>  
                                    <form class="" id="forgot_otp_form" ng-show="forgottwo">
                                        <div id="userprofilesuccess" ng-class="otpSuccess ? 'alert alert-success text-center displayBlock' : 'displayNone'" class="">
                                            {{otpSuccess}}
                                        </div>
                                        <div id="userprofilesuccess" ng-class="otpError ? 'alert alert-danger text-center displayBlock' : 'displayNone'" class="">
                                            {{otpError}}
                                        </div>
                                        <p class="top10" >You will receive a OTP over SMS and enter it to Change Password.</p>
                                        <div class="form-group relative-div">
                                            <label>Enter OTP*</label>
                                            <input class="form-control login-input" type="text" maxlength="5" ng-model="otp" ng-change="checkForgotOtp();" name="otp" placeholder="Enter OTP"/> 
                                            <div class="error" ng-show="invalid">Invalid OTP.</div>
                                            <input class="btn login-submit pull-right top5" type="submit" ng-click="otpForgot();" value="{{ subval}}" ng-disabled="otpbtn"/>
                                            <a class="btn login-submit pull-right top5" ng-if="countDown < 0" ng-click="resendotp()" href="javascript:void(0)">{{resend}}</a>
                                            <input ng-model="countDown" ng-show="timer" class="top5 otptimer" ng-readonly="true"/>
                                        </div>
                                    </form>
                                     <form id="forgot_change_password" name="forgot_change_password" ng-show="forgotthree">
                                         <div id="userprofilesuccess" ng-class="passwordSuccess ? 'alert alert-success text-center displayBlock' : 'displayNone'" class="">
                                            {{passwordSuccess}}
                                        </div>
                                        <div id="userprofilesuccess" ng-class="passwordError ? 'alert alert-danger text-center displayBlock' : 'displayNone'" class="">
                                            {{passwordError}}
                                        </div>
                                        <div class="form-group bottom55 forgotNew">
                                            <label>New Password*</label>
                                            <input class="form-control login-input" type="password" name="newpassword" id="newpassword" ng-model="newpassword" placeholder="Enter your New Password">
                                            <label>Confirm Password*</label>
                                            <input class="form-control login-input" type="password" name="confirmpassword" ng-model="confirmpassword" placeholder="Confirm Your Password">
                                            <div class="margin-top-10">
                                                <a class="btn login-cancel" href="#/login">Cancel</a> 
                                                <input class="btn login-submit pull-right" type="submit" ng-click="changePassword();" value="{{subval}}" />
                                            </div>
                                        </div>
                                    </form>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>