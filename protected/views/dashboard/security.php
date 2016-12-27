<div class="mainContentIn">
  <div class="customTabbed">
	<a  href="#/settings">MY PROFILE</a>
	<a class="active" href="#/security">SECURITY</a>
	<a ng-click="getVerificationDetails()" href="#/verification">VERIFICATION</a>
	<a ng-click="getBankDetails()" href="#/bankaccounts">BANK ACCOUNTS</a>
  </div>
  <div class="ContentSection settings">
	<div class="tableStructure">
	  <div class="row">
		<div class="col-md-1 icons">
		  <i><img title="Icon" alt="icon" src="/images/icons/setting-change-password.png"></i>
		</div> 
		<div class="col-md-7 settingContent">
		  <h4>Change password</h4>
		  <span>A suggested security practice is to change your password every 30 days to prevent it from unauthorized access. However this is not mandatory.</span>
		</div>
		<div class="col-md-4 text-right settingBtns padding-right0">
		  <a href="javascript:void(0)" class="btn greenBtn modify">Modify</a>
		</div>
		<div class="col-md-12">
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
		  <div class="securityModify clearfix top10">
			<div class="col-md-5 col-md-offset-3 padding-right0">
			  <p class="inTitle">Change Password</p>
			  <form name="security.changepasswordForm" ng-submit="security.changepasswordForm.$valid" novalidate>
				<div class="col-md-12 padding0">
				  <span class="input input--hoshi">
					<input class="inputClass input__field input__field--hoshi" ng-trim="false" ng-change="checkoldPassword()" invalid type="password" name="oldpassword" ng-model="security.oldpassword" required>
					<label class="input__label input__label--hoshi input__label--hoshi-color-1">
					  <span class="input__label-content input__label-content--hoshi">Current Password</span>
					</label>
					<div ng-show="security.changepasswordForm.$submitted || security.changepasswordForm.oldpassword.$touched">      
					  <div class="errorMsg" ng-show="security.changepasswordForm.oldpassword.$error.required">Please Enter Current Password.</div>   
					  <div class="errorMsg" ng-show="security.changepasswordForm.oldpassword.$error.invalid">Invalid Password.</div>   
					</div>
				  </span>
				</div>
				<div class="col-md-12 padding0">
				  <span class="input input--hoshi">
					<input class="inputClass input__field input__field--hoshi" ng-trim="false" type="password" ng-change="checkPassSecurity()" ng-minlength="6" ng-maxlength="15" name="newpassword" ng-model="security.newpassword" required>
					<label class="input__label input__label--hoshi input__label--hoshi-color-1">
					  <span class="input__label-content input__label-content--hoshi">New Password</span>
					</label>

					<div ng-show="security.changepasswordForm.$submitted || security.changepasswordForm.newpassword.$touched">      
					  <div class="errorMsg" ng-show="security.changepasswordForm.newpassword.$error.required">Please Enter Password.</div>   
					  <div class="errorMsg" ng-show="security.changepasswordForm.newpassword.$error.minlength">Password should be atleast 6 character.</div>   
					  <div class="errorMsg" ng-show="security.changepasswordForm.newpassword.$error.maxlength">Password should be Maximum 15 character.</div>   
					</div>
				  </span>
				</div>
				
				<div ng-show="pswLevel" class="securityLevel clearfix" >
                                            <div class="progress"> 
                                                <div class="progress-bar {{passwordLevel}}" role="progressbar"
                                                     aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="securityIndicators text-right">
                                                <span>Week</span>
                                                <span>Medium</span>
                                                <span>Strong</span>
                                            </div>
                                        </div>
				<div class="col-md-12 padding0">
				  <span class="input input--hoshi">
					<input class="inputClass input__field input__field--hoshi" ng-trim="false" type="password" ng-change="checkPassword()" name="confirmpassword" ng-model="security.confirmpassword" required>
					<label class="input__label input__label--hoshi input__label--hoshi-color-1">
					  <span class="input__label-content input__label-content--hoshi">Confirm Password</span>
					</label>
					<div ng-show="security.changepasswordForm.$submitted || security.changepasswordForm.confirmpassword.$touched">      
					  <div class="errorMsg" ng-show="security.changepasswordForm.confirmpassword.$error.required">Please Enter Confirm Password.</div>   
					  <div class="errorMsg" ng-show="security.changepasswordForm.confirmpassword.$error.checkpass">Password not Matched.</div>   
					</div>
				  </span>    
				</div>
				<div class="col-md-12 padding0">
				  <input class="btn top10 btn-block greenBtn" ng-click="security.changepasswordForm.$valid ? changePassword() : ''" type="submit" value="Update">
				</div>
			  </form>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="row">
		<div class="col-md-12">
		  <div class="col-md-9 col-md-offset-1 padding-left0">
			<div ng-class="successSmart ? 'successNew' : ''" ng-hide="showClose" class="msgInfo">
			  <p class="msgOnly">{{successSmart}}</p>
			  <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
			</div>
		  </div>
		  <div class="col-md-9 col-md-offset-1 padding-left0">
			<div ng-class="errorSmart ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
			  <p class="msgOnly">{{errorSmart}}</p>
			  <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
			</div>
		  </div>
		</div>
		<div class="col-md-1 icons">
		  <i><img title="Icon" alt="icon" src="/images/icons/smart- identification.png"></i>
		</div>
		<div class="col-md-7 settingContent">
		  <h4>Smart Identification</h4>
		  <span>At every login attempt, several parameters are checked. If the system sees any change in user IP address, browser type etc. as suspicious, User will need to receive a security PIN code over email and enter it to log in.</span>
		</div>               
		<form name="identification.smartForm" ng-submit="security.smartForm.$valid" novalidate>
		  <div class="col-md-4 text-right settingBtns padding-right0">
			<label class="switch">
			  <input class="switch-input" name="smartidentification" ng-model="identification.smartidentification" ng-change="changesmartidentification()" type="checkbox" />
			  <span class="switch-label" data-on="On" data-off="Off"></span> 
			  <span class="switch-handle"></span> 
			</label>
		  </div>
		</form>
	  </div>
            <div class="row emailUpdateError" ng-if="smartvalid">
                <div class="col-md-12">
                    <span class="errorMsg" ng-show="smartvalid">Please make sure <a href="#/verification">Email updated and verified</a>.</span>
                </div>
            </div>
	  <div class="row">
		<div class="col-md-1 icons">
		  <i><img title="Icon" alt="icon" src="/images/icons/transaction-password.png"></i>
		</div>
		<div class="col-md-7 settingContent">
		  <h4>Transaction Password</h4>
		  <span>When this is enabled, Transaction Password will be required for money transfers and withdrawals from all wallets.</span>
		</div>
		<div class="col-md-4 text-right settingBtns padding-right0">
		  <a href="javascript:void(0)" class="btn greenBtn configure">{{trsactionPassword}}</a>
		  <a href="javascript:void(0)" ng-if="trsactionPassword == 'Modify'" class="btn greenBtn cancel">Remove</a>
		</div>
		<div class="col-md-12">
		  <div class="securityConfigure">
			<div class="col-md-12">
			  <div class="col-md-9 col-md-offset-1 padding-left0">
				<div ng-class="successTransaction ? 'successNew top10' : ''" ng-hide="showClose" class="msgInfo">
				  <p class="msgOnly">{{successTransaction}}</p>
				  <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
				</div>
			  </div>
			  <div class="col-md-9 col-md-offset-1 padding-left0">
				<div ng-class="errorTransaction ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
				  <p class="msgOnly">{{errorTransaction}}</p>
				  <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
				</div>
			  </div>
			</div>
			<div class="col-md-5 col-md-offset-3 padding-right0">
			  <p class="inTitle">{{trsactionPassword}}</p>
			  <form name="configure.transactionForm" ng-submit="configure.transactionForm.$valid" novalidate>
				<div class="col-md-12 padding0">
				  <div ng-if="trsactionPassword == 'Modify'" class="col-md-12 padding0">
					<span class="input input--hoshi">
					  <input class="inputClass input__field input__field--hoshi" ng-trim="false" type="password" ng-change="checkTransaction()" name="tranoldpassword" ng-model="configure.tranoldpassword" required>
					  <label class="input__label input__label--hoshi input__label--hoshi-color-1">
						<span class="input__label-content input__label-content--hoshi">Current Transaction Password</span>
					  </label>
					  <div ng-show="configure.transactionForm.$submitted || configure.transactionForm.tranoldpassword.$touched">      
						<div class="errorMsg" ng-show="configure.transactionForm.tranoldpassword.$error.required">Please Enter Current Transaction Password.</div>   
						<div class="errorMsg" ng-show="configure.transactionForm.tranoldpassword.$error.transactionpass">Transaction Password not Matched.</div>   
					  </div>
					</span>
				  </div>
				  <div class="col-md-12 padding0">
					<span class="input input--hoshi">
					  <input class="inputClass input__field input__field--hoshi" ng-trim="false" ng-minlength="6" ng-maxlength="15" ng-pattern="/^[a-zA-Z0-9]+$/" type="password" name="tranpassword" ng-model="configure.tranpassword" required>
					  <label class="input__label input__label--hoshi input__label--hoshi-color-1">
						<span class="input__label-content input__label-content--hoshi">New Transaction Password</span>
					  </label>
					  <div ng-show="configure.transactionForm.$submitted || configure.transactionForm.tranpassword.$touched">      
						<div class="errorMsg" ng-show="configure.transactionForm.tranpassword.$error.required">Please Enter New Transaction Password.</div>   
						<div class="errorMsg" ng-show="configure.transactionForm.tranpassword.$error.minlength">Transaction Password Should be minimum 6 char.</div>
						<div class="errorMsg" ng-show="configure.transactionForm.tranpassword.$error.maxlength">Transaction Password Should be maximum 15 char.</div>
						<div class="errorMsg" ng-show="configure.transactionForm.tranpassword.$error.pattern">Only Alphanumeric Allowed.</div>
					  </div>
					</span>
				  </div>
				  <div class="col-md-12 padding0">
					<span class="input input--hoshi">
					  <input class="inputClass input__field input__field--hoshi" ng-trim="false" type="password" ng-change="matchPassword()" name="retypepassword" ng-model="configure.retypepassword" required>
					  <label class="input__label input__label--hoshi input__label--hoshi-color-1">
						<span class="input__label-content input__label-content--hoshi">Retype Transaction Password</span>
					  </label>
					  <div ng-show="configure.transactionForm.$submitted || configure.transactionForm.retypepassword.$touched">      
						<div class="errorMsg" ng-show="configure.transactionForm.retypepassword.$error.required">Please retype Transaction Password.</div>   
						<div class="errorMsg" ng-show="configure.transactionForm.retypepassword.$error.transactionpassword">Transaction Password not Matched.</div>   
					  </div>
					</span>    
				  </div>
				  <div class="col-md-12 padding0">
					<input class="btn btn-block top10 greenBtn" ng-click="configure.transactionForm.$valid ? changeTransactionPassword() : ''" type="submit" value="Submit">
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		</div>
		<div class="col-md-12">
		  <div class="cancelPassword" style="display: none;">
			<div class="col-md-12">
			  <div class="col-md-9 col-md-offset-1 padding-left0">
				<div ng-class="successCTransaction ? 'successNew top10' : ''" ng-hide="showClose" class="msgInfo">
				  <p class="msgOnly">{{successCTransaction}}</p>
				  <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
				</div>
			  </div>
			  <div class="col-md-9 col-md-offset-1 padding-left0">
				<div ng-class="errorCTransaction ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
				  <p class="msgOnly">{{errorCTransaction}}</p>
				  <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
				</div>
			  </div>
			</div>
			<div class="col-md-5 col-md-offset-3 padding-right0">
			  <p class="inTitle">Cancel Transaction Password</p>
			  <form name="cancel.transactionpswForm" ng-submit="cancel.transactionpswForm.$valid" novalidate>
				<div class="col-md-12 padding0">
				  <div ng-if="trsactionPassword == 'Modify'" class="col-md-12 padding0">
					<span class="input input--hoshi">
					  <input class="inputClass input__field input__field--hoshi" ng-trim="false" type="password" ng-change="checkCancelTransaction()" name="transactionpsw" ng-model="cancel.transactionpsw" required>
					  <label class="input__label input__label--hoshi input__label--hoshi-color-1">
						<span class="input__label-content input__label-content--hoshi">Current Transaction Password</span>
					  </label>
					  <div ng-show="cancel.transactionpswForm.$submitted || cancel.transactionpswForm.transactionpsw.$touched">      
						<div class="errorMsg" ng-show="cancel.transactionpswForm.transactionpsw.$error.required">Please Enter Current Transaction Password.</div>   
						<div class="errorMsg" ng-show="cancel.transactionpswForm.transactionpsw.$error.cancelPassword">Transaction Password not Matched.</div>   
					  </div>
					</span>
				  </div>
				  <div class="col-md-12 padding0">
					<input class="btn top10 btn-block greenBtn" ng-click="cancel.transactionpswForm.$valid ? cancelTransactionPassword() : ''" type="submit" value="Submit">
				  </div>
				</div>
			  </form>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="row">
		<div class="col-md-12">
		  <div class="col-md-9 col-md-offset-1 padding-left0">
			<div ng-class="successSms ? 'successNew top10' : ''" ng-hide="showClose" class="msgInfo">
			<p class="msgOnly">{{successSms}}</p>
			<a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
		  </div>
		  </div>
		  <div class="col-md-9 col-md-offset-1 padding-left0">
			<div ng-class="errorSms ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
			<p class="msgOnly">{{errorSms}}</p>
			<a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
		  </div>
		  </div>
		</div>
		<div class="col-md-1 icons">
		  <i><img title="Icon" alt="icon" src="/images/icons/sms-authorization.png"></i>
		</div>
		<div class="col-md-7 settingContent">
		  <h4>SMS authorization  (2-factor authentication) </h4>
		  <span>When this is enabled, users will to receive a code via SMS every time a user logs into account.</span>
		</div>
		<form name="sms.authorizationForm" ng-submit="sms.authorizationForm.$valid" novalidate>
		  <div class="col-md-4 text-right settingBtns padding-right0">
			<label class="switch">
			  <input class="switch-input" name="smsauthorization" ng-model="sms.smsauthorization" ng-change="changesmsauthorization()" type="checkbox" />
			  <span class="switch-label" data-on="On" data-off="Off"></span> 
			  <span class="switch-handle"></span>
			</label>
		  </div>
		</form>
	  </div>
            <div class="row emailUpdateError" ng-if="smsvalid">
                <div class="col-md-12">
                    <span class="errorMsg" ng-show="smsvalid">Please make sure <a href="#/verification">phone number updated and verified</a>.</span>
                </div>
            </div>
	</div>
  </div>
</div>
