    <div class="register-div">
    <div class="container login-container top60 bottom95">
        <div id="userprofilesuccess" ng-class="success ? 'alert alert-success text-center displayBlock' : 'displayNone'" class="">
                {{success}}
            </div>
            <div id="userprofilesuccess" ng-class="error ? 'alert alert-danger text-center displayBlock' : 'displayNone'" class="">
                {{error}}
            </div>
        <div class="row">
            
            <div class="col-md-5 col-md-offset-4  login-white width95 portlet box green exchange-box buy-relative">
                <div class="portlet-title">
                    <div class="caption text-center">
                        Reset Password
                    </div>                               
                </div>
                <div class="portlet-body form border-form">
                    <div id="wrapper">                         
                        <div class="text_block">
                            <div class="login-main login-full-width">                            
                                <form id="reset_password" name="reset_password">
                                    <div class="form-group bottom55">
                                        <label>New Password*</label>
                                        <input class="form-control login-input" type="password" maxlength="15" name="newpassword" id="newpassword" ng-model="newpassword" placeholder="Enter New Password">
                                       
                                        <label>Confirm Password*</label>
                                        <input class="form-control login-input" type="password" maxlength="15" name="confirmpassword" ng-model="confirmpassword" placeholder="Enter Confirm password">
                                        <a class="btn login-cancel margin-right5 matop5" href="#/login">Cancel</a> 
                                        <input class="btn login-submit pull-right matop5" type="submit" ng-disabled="ok" ng-click="resetPassword();" value="{{subval}}" />
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