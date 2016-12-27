<div class="dashboard-main">
    <div class="container">
        <div class="row relative-div">
            <?php $this->renderPartial('dashboardsidemenu'); ?>
            <?php $this->renderPartial('notification'); ?>
            <div class="col-md-10 col-sm-10 dashboard-div top50">
                <p class="menu-head"><span class="dbhead-left">Change Password</span>
                </p>
                <div class="padding0 dashboard-content ">
                    <p class="note ">NOTE: Password min length is 5 characters. Make sure that "Caps Lock" is off.</p>
                        <div id="success" class="top-success-msg"></div>
                        <div id="error" class="top-error-msg"></div>
                    <div class="padding0 col-md-5 col-sm-5  col-md-offset-4">
                        <form ng-controller="changePasswordCtrl">
                            <div class="form-group paddingright-10 relative-div">
                                <label>Old Password*</label>
                                <input class="form-control buyform-input" type="password" ng-model="oldpswd" maxlength="33" id='oldpswd'>
                                <span class='error-msg' id="old_password_error"></span>
                            </div>
                            <div class="form-group paddingright-10 relative-div">
                                <label>New Password*</label>
                                <input class="form-control buyform-input" type="password" ng-model="newpswd" maxlength="33" id='newpswd'>
                                <span class='error-msg' id="new_password_error"></span>
                            </div>
                            <div class="form-group paddingright-10 relative-div">
                                <label>Confirm Password*</label>
                                <input class="form-control buyform-input" type="password" maxlength="33" ng-model="confirmpswd" id="confirmpswd">
                                <span class='error-msg' id="confirm_password_error"></span>
                                <span class='error-msg' id="validate_error"></span>
                                <!--<div ng-show="loading"><h3 class="reseting">Reseting Password ...</h3></div> -->
                                <button type="submit" class="btn pull-right db-submit" ng-click='ChangePassword();' ng-disabled="ok">Update Password</button>
                            </div>

                        </form>

                    </div>
                    <div class="swirl"></div>
                </div>
            </div>
        </div>
    </div>
</div>
