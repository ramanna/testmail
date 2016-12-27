<div class="login-div">
  <div class="container login-container top60 bottom95 relative-div">
	<div class="col-md-4 col-md-offset-4" id="register">
	  <div id="userprofilesuccess" ng-class="success ? 'alert alert-success text-center displayBlock' : 'displayNone'" class="">{{success}}</div>
	  <div id="userprofilesuccess" ng-class="error ? 'alert alert-danger text-center displayBlock' : 'displayNone'" class="">{{error}}</div>
	  <div class="login-white portlet box green exchange-box buy-relative full-width">
		<div class="portlet-title"><div class="caption text-center">Registration</div></div>
		<div class="portlet-body form border-form">
		  <p class="text-center top10" ng-if="registerone">Join us now to exchange all kinds of digital currency in a fast, secure and reliable way.</p>
		  <div class="login-mix register-main col-md-6 col-sm-6">
			<form class="registration_form" id="registration_form" name="registration_form" ng-show="registerone">
			  <div class="form-group relative-div">
				<label>E-mail / Phone Number*</label>
				<input class="form-control login-input" type="text" ng-change="checkemailorno()" name ="email" ng-model="email" placeholder="Enter your emailId / Phone No"/> 
			  </div>
			  <div ng-show="phoneCountry" class="form-group relative-div country">
				<select class="form-control" name="country" ng-change="countrySel()" ng-model="country">
				  <option value=''>- Please Choose Country -</option>
				  <option ng-repeat="country in countrynameJson" value="{{country.id}}">{{country.name}}</option>
				</select>
				<div class="errorMsg" ng-show="required">Please Select Country</div>   
			  </div>
			  <ul class="col-md-8 col-sm-8 list-unstyled list-inline user-social-ul ">
				<li>Social Register:</li>
				<!--<li><a class="login-i login-fb" ng-click="fblogin()"  ><i class="fa fa-facebook"></i></a></li>-->
				<li><a class="login-i login-gp" ng-click="googleplus()"><i class="fa fa-google-plus"></i></a></li>
			  </ul>
			  <input class="btn login-submit pull-right" type="submit" value="{{ subval}}" ng-click='Register();' ng-disabled="ok"/>
			</form>
			<form class="" id="otp_form" ng-show="registertwo">
			  <div id="userprofilesuccess" ng-class="otpSuccess ? 'alert alert-success text-center displayBlock' : 'displayNone'" class="">{{otpSuccess}}</div>
			  <div id="userprofilesuccess" ng-class="otpError ? 'alert alert-danger text-center displayBlock' : 'displayNone'" class="">{{otpError}}</div>
			  <p>You will receive a OTP over SMS and enter it to Register Successfully.</p>
			  <div class="form-group relative-div">
				<label>Enter OTP*</label>
				<input class="form-control login-input" type="text" maxlength="5" ng-model="otp" ng-change="checkOtp();" name="otp" placeholder="Enter OTP"/> 
				<div class="errorMsg" ng-show="invalid">Invalid OTP.</div>
				<input class="btn login-submit pull-right top5" type="submit" ng-click="otpRegister();" value="{{ subval}}" ng-disabled="otpbtn"/>
				<a class="btn login-submit pull-right top5" ng-if="countDown < 0" ng-click="resendotp()" href="javascript:void(0)">{{resend}}</a>
				<input ng-model="countDown" ng-show="timer" class="top5 otptimer" ng-readonly="true"/>
			  </div>
			</form>
			<div class="clearfix"></div>
			<div ng-show="!registertwo" class="forgot-div">
			  <ul class="list-inline list-unstyled forgot-ul">
				<li><a href="#/login"> Login </a></li>
				<li><a href="#/resetlink"> Resend Activation link </a></li>
				<li><a href="#/forgotpassword"> Forgot Password </a></li>
			  </ul>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>