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
			<form name="securitypin.loginForm" ng-submit="securitypin.loginForm.$valid" novalidate class="socialLoginform">
			  <p class="top10">You will receive a Smart Identification PIN over email and enter it to log in.</p>
			  <div class="form-group relative-div socialLogindiv">
				<label>Enter Pin*</label>
				<input class="form-control login-input" type="text" maxlength="5" ng-trim="false" invalid ng-model="securitypin.pinvalue" ng-change="checkPin();" name="pinvalue" placeholder="Enter Pin" required/> 
				<!--<span ng-show="pinValidation" class="errorMsg">Invalid Smart identification Pin. </span>-->
				<div ng-show="securitypin.loginForm.$submitted || securitypin.loginForm.pinvalue.$touched">      
				  <div class="errorMsg" ng-show="securitypin.loginForm.pinvalue.$error.required">Please Enter Smart Identification Pin.</div>   
				  <div class="errorMsg" ng-show="securitypin.loginForm.pinvalue.$error.invalid">Invalid Smart Identification Pin.</div>   
				</div>
			  </div>
			  <input class="btn login-submit pull-right custom-login-btn top5" type="submit" ng-click="securitypin.loginForm.$valid ? securityLogin() : ''" value="{{subval}}" ng-disabled="slog"/>
			</form>
			<div class="clearfix"></div>

		  </div>

		</div>    
	  </div>
	</div> 
  </div>
</div>
