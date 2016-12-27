<div class="login-div">
  <div class="container login-container top60 bottom95 relative-div">
	<div class="login-mix col-md-6 col-sm-6">
	<div class="row top10">
	  <div class="col-md-4 col-md-offset-4">
		<div id="userprofilesuccess" ng-class="success ? 'alert alert-success text-center displayBlock' : 'displayNone'" class="">
		  {{success}}
		</div>
		<div id="userprofilesuccess" ng-class="error ? 'alert alert-danger text-center displayBlock' : 'displayNone'" class="">
		  {{error}}
		</div>
		<div class="login-white portlet box green exchange-box buy-relative full-width">
		  <div class="portlet-title">
			<div class="caption text-center">
			  Resend Activation Link
			</div>                               
		  </div>
		  <div class="portlet-body form border-form">
			<div id="wrapper">                         
			  <div class="text_block">
				<div class="login-full-width">                            
				  <form id="resend_activation" name="resend_activation">
					<div class="form-group bottom55">
					  <label>Email*</label>
					  <input class="form-control login-input" type="text" name="email" ng-model="email" placeholder="Enter your email id">
					  <div class="margin-top-10">
						<a class="btn login-cancel margin-right5" href="#/login">Cancel</a> 
					  <input class="btn login-submit pull-right" type="submit" ng-click="resendActivation();" value="{{subval}}" />
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
</div>