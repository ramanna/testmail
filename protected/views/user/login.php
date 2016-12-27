<div class="login-div">
    <div class="container login-container top60 bottom95 relative-div">
        <div class="col-md-4 col-md-offset-4" >
            <?php
            if (isset(Yii::app()->session['paymentSuccess']) && !empty(Yii::app()->session['paymentSuccess'])) {
                echo "<p class='successFrmMsg'>" . Yii::app()->session['paymentSuccess'] . "</p>";
                Yii::app()->session['paymentSuccess'] = "";
            }
            if (isset(Yii::app()->session['paymentError']) && !empty(Yii::app()->session['paymentError'])) {
                echo "<p class='errorFrmMsg'>" . Yii::app()->session['paymentError'] . "</p>";
                Yii::app()->session['paymentError'] = " ";
            }
            ?>
            <div ng-class="success ? 'alert alert-success text-center displayBlock' : 'displayNone'" class="">
                {{success}}
            </div>
            <div ng-class="error ? 'alert alert-danger text-center displayBlock' : 'displayNone'" class="">
                {{error}}
            </div>
            <div class="login-white portlet box green exchange-box buy-relative full-width">
                <div class="portlet-title">
                    <div class="caption text-center">
                        {{headingText}}
                    </div>                               
                </div>
                <div class="portlet-body form border-form">
                    <div id="wrapper"> 
                        <form class="login_form" id="login_form" ng-show="loginone">
                            <div class="form-group relative-div">
                                <label>E-mail / Phone Number*</label>
                                <input class="form-control login-input" type="text" ng-model="email" name="email" placeholder="Enter your email id or Phone No"/> 
                            </div>
                            <div class="form-group relative-div">
                                <label>Password*</label>
                                <input class="form-control login-input" type="password" ng-model="password" name="password" placeholder="Enter your password"/>
                            </div>
                            <ul class="col-md-8 col-sm-8 list-unstyled list-inline user-social-ul ">
                                <li>Social Login:</li>
                                <!--<li><a class="login-i login-fb" ng-click="fblogin()"  ><i class="fa fa-facebook"></i></a></li>-->
                                <li><a class="login-i login-gp" ng-click="googleplus()"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                            <input class="btn login-submit pull-right custom-login-btn" type="submit" ng-click="Login();" value="{{ subval}}" ng-disabled="ok"/>
                        </form>
                        <form class="" id="loginpin_form" ng-show="logintwo">
                            <p class="top10">You will receive a Smart Identification PIN over email and enter it to log in.</p>
                            <div class="form-group relative-div">
                                <label>Enter Pin*</label>
                                <input class="form-control login-input" type="text" maxlength="5" ng-model="pin" ng-change="checkPin();" name="pin" placeholder="Enter Pin"/> 
                            </div>
                            <input class="btn login-submit pull-right custom-login-btn top5" type="submit" ng-click="checkLogin();" value="{{ subval}}" ng-disabled="clog"/>
                        </form>
                        <!--{{genpin}}-->
                        <div class="clearfix"></div>
                        <div ng-show="!logintwo" class="forgot-div" >
                            <ul class="list-inline list-unstyled forgot-ul">
                                <li><a href="#/registration"> Register </a></li>
                                <li><a href="#/resetlink">Resend Activation link </a></li>
                                <li><a href="#/forgotpassword">Forgot Password </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

