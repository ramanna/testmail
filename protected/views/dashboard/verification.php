<div class="mainContentIn">
  <div class="customTabbed">
    <a  href="#/settings">MY PROFILE</a>
    <a href="#/security">SECURITY</a>
    <a class="active" ng-click="getVerificationDetails()" href="#/verification">VERIFICATION</a>
    <a ng-click="getBankDetails()" href="#/bankaccounts">BANK ACCOUNTS</a>
  </div>
  <div class="ContentSection verificationContent">
    <uib-tabset active="activeForm" class="TabbedMenu">
      <uib-tab index="3" ng-click="clrIdMsg()">
        <uib-tab-heading>
          <h5>ID Proof</h5>
          <span><img src="/images/icons/id-cards.png"></span> 
          <h5 ng-class="(idVerified == 'PENDING' || idVerified == 'REJECTED' || idVerified == 'NOT VERIFIED') ? 'error' : 'verified'" ><span ng-if="idVerified"><i class="fa fa-check" aria-hidden="true" ng-if="idVerified == 'APPROVED'"></i>{{idVerified}}</span></h5>
        </uib-tab-heading>
        <div class="tabContentIn">
          <div class="col-md-12">
            <div ng-class="successverifi ? 'successNew top10' : ''" ng-hide="showClose" class="msgInfo">
              <p class="msgOnly">{{successverifi}}</p>
              <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
            </div>
            <div ng-class="errorverifi ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
              <p class="msgOnly">{{errorverifi}}</p>
              <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
            </div>
          </div>
          <div ng-if="idVerified == 'PENDING'" class="col-md-9 col-md-offset-1 text-center alert alert-info clearfix">Your document is submitted and It will be verified by admin, You can Update your document.</div>
          <div ng-if="idVerified == 'REJECTED'" class="col-md-9 col-md-offset-1 text-center alert alert-warning clearfix">Your document has been REJECTED. Please Upload New Document for Verification</div>
          <form ng-if="idVerified != 'APPROVED'" name="verification.idproofform" ng-submit="verification.idproofform.$valid" novalidate>
            <div class="col-md-4">
              <h4>Upload/Update ID Proof (PAN Card)</h4>
              <div class="ContentIn">
                <input type="file" ng-model="verification.idproof" name="idproof" class="form-control formNoMargin" ng-files="getFiles($files)" valid-file required/>
              </div>
              <p class="uploadSize">(Upload jpg ,png files only, 2MB Max Size)</p>
              <div id="idproofImg" class="errorMsg"> </div>
              <div id="idprooftype" class="errorMsg"> </div>
              <div class="" ng-show="verification.idproofform.$submitted || verification.idproofform.idproof.$touched"> 
                <span class="errorMsg" ng-show="verification.idproofform.idproof.$error.maxsize"> Max Upload Size is 2MB</span>
                <span class="errorMsg" ng-show="verification.idproofform.idproof.$error.filetype"> Unsupported file format</span>
              </div>
            </div>
            <div class="col-md-8">
              <h4>Name Validation</h4>
              <div class="ContentIn">
                <ul>
                  <li>TopOneExchange will match the name in your document against the name entered in your profile.</li>
                  <li>Any mismatch of NAME in your profile information will cause 'Name Validation' to be reset.</li>
                  <li>Required: Scanned copy of your Identification Document (PAN Card).</li>
                </ul>
                <button ng-disabled="verification.idproofform.$invalid" id="idproof" ng-click="uploadIdProof()" type="submit" class="btn greenBtn"><i class="icon-white icon-ok"></i>&nbsp;{{idbtn}}</button>
              </div>
            </div>
          </form>
          <h4 class="margin-bottom-10" ng-if="idVerified == 'APPROVED'"> Id Proof Verified</h4>
        </div>
      </uib-tab>
      <uib-tab index="2" ng-click="clrMsg()">
        <uib-tab-heading>
          <h5>Address Proof</h5>
          <span><img src="/images/icons/address.png"></span> 
          <h5 ng-class="(addressVerified == 'PENDING' || addressVerified == 'REJECTED' || addressVerified == 'NOT VERIFIED') ? 'error' : 'verified'"><span ng-if="addressVerified"><i class="fa fa-check" aria-hidden="true" ng-if="addressVerified == 'APPROVED'"></i>{{addressVerified}}</span></h5>
        </uib-tab-heading>
        <div class="tabContentIn">
          <div class="col-md-12">
            <div ng-class="successverify ? 'successNew top10' : ''" ng-hide="showClose" class="msgInfo">
              <p class="msgOnly">{{successverify}}</p>
              <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
            </div>
            <div ng-class="errorverify ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
              <p class="msgOnly">{{errorverify}}</p>
              <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
            </div>
          </div>
          <div ng-if="addressVerified == 'PENDING'" class="col-md-9 col-md-offset-1 text-center alert alert-info clearfix">Your document is submitted and It will be verified by admin, You can Update your document.</div>
          <div ng-if="addressVerified == 'REJECTED'" class="col-md-9 col-md-offset-1 text-center alert alert-warning clearfix">Your document has been REJECTED. Please Upload New Document for Verification</div>
          <form ng-if="addressVerified != 'APPROVED'" name="verify.addressproofform" ng-submit="verify.addressproofform.$valid" novalidate>
            <div class="col-md-4">
              <h4>Upload / Update Address Proof *</h4>
              <div class="relative-div verification-mobile">
                <label>Country</label>
                <select class="form-control" name="country" ng-model="verify.country" required>
                  <option value=''>- Please Choose Country -</option>
                  <option 
                    ng-repeat="country in countrynameJson"
                    value="{{country.id}}">
                    {{country.name}}
                  </option>
                </select>
                <div ng-show="verify.addressproofform.$submitted || verify.addressproofform.country.$touched">      
                  <div class="errorMsg" ng-show="verify.addressproofform.country.$error.required">Please Select Country.</div>   
                </div>
              </div>
              <div class="ContentIn">
                <label>Address Proof</label>
                <input type="file" ng-model="verify.addressproof" name="addressproof" class="form-control formNoMargin" valid-file ng-files="getAddressFiles($files)" required/>
              </div>
              <p class="uploadSize">(Upload jpg ,png, pdf files only, 2MB Max Size)</p>
              <div id="addressproofImg" class="errorMsg"></div>
              <div id="addressprooftype" class="errorMsg"> </div>
              <div class="" ng-show="verify.addressproofform.$submitted || verify.addressproofform.addressproof.$touched"> 
                <span class="errorMsg" ng-show="verify.addressproofform.addressproof.$error.required">Please Upload Address Proof.</span> 
                <span class="errorMsg" ng-show="verify.addressproofform.addressproof.$error.maxsize"> Max Upload Size is 2MB</span>
                <span class="errorMsg" ng-show="verify.addressproofform.addressproof.$error.filetype"> Unsupported file format</span>
              </div>
            </div>
            <div class="col-md-8">
              <h4>Address Validation</h4>
              <div class="ContentIn">
                <ul>
                  <li>TopOneExchange will match the address provided in the document submitted against the address proof entered in your profile.</li>
                  <li>Any mismatch of ADDRESS in your profile information will cause 'Address Validation' to be reset.</li>
                  <li>Required: Scanned copy of your Address Proof Document (passport or Bank statement).</li>
                </ul>
                <button id="addressproof" ng-click="uploadAddressProof()" type="submit" class="btn greenBtn"><i class="icon-white icon-ok"></i>&nbsp;{{Abtn}}</button>
              </div>
            </div>
          </form>
          <h4 class="margin-bottom-10" ng-if="addressVerified == 'APPROVED'"> Address Proof Verified</h4>
        </div>
      </uib-tab>
      <uib-tab index="1">
        <uib-tab-heading>
          <h5>Phone Number</h5>
          <span><img src="/images/icons/phone-number.png"></span>
          <h5 ng-class="mobileVerified == 'VERIFIED' ? 'verified' : 'error'"><i class="fa fa-check" aria-hidden="true" ng-if="mobileVerified == 'VERIFIED'"></i>{{mobileVerified == 'VERIFIED' ? 'Verified' : 'Not Verified'}}</h5>
        </uib-tab-heading>
        <div class="tabContentIn verifyNumber">
          <div class="col-md-6 col-md-offset-3">                   
            <h4 ng-if="mobileVerified == 'VERIFIED'" class="margin-bottom-10">You Have Been Verified.</h4>
            <form name="mobile.verifyForm" ng-submit="mobile.verifyForm.$valid" novalidate>
              <div class="verifyMobileForm" ng-if="mobileVerified != 'VERIFIED'">
                <h4 class="margin-bottom-10">Verify Your Phone Number</h4>
                <div ng-show="otpstepone">
                  <div ng-class=" error ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
                    <p class="msgOnly">{{error}}</p>
                    <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
                  </div>
                  <p ng-if="mobileVerified != 'VERIFIED'" class="NumberInfo">To verify your mobile please key in the One Time Password (OTP) sent to your mobile number.</p>
                  <div  class="relative-div verification-mobile">
                    <select class="form-control" name="codecountry" ng-model="mobile.codecountry" ng-change="getCountryCode()" required>
                      <option value=''>- Please Choose Country -</option>
                      <option ng-repeat="country in countrynameJson" value="{{country.id}}">{{country.name}}</option>
                    </select>
                    <div ng-show="mobile.verifyForm.$submitted || mobile.verifyForm.codecountry.$touched">      
                      <div class="errorMsg" ng-show="mobile.verifyForm.codecountry.$error.required">Please Select Country.</div>   
                    </div>
                  </div>
                  <div class="relative-div mobileCode">
                    <div class="col-md-3 padding-left0">
                      <span class="input input--hoshi">
                        <input class="input__field input__field--hoshi" type="text" name="countrycode" ng-model="mobile.countrycode" ng-readonly="code" />
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                          <span class="input__label-content input__label-content--hoshi">Code</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-9 padding-right0">
                      <span class="input input--hoshi">
                        <input class="input__field input__field--hoshi" type="text" ng-maxlength="15"  ng-trim="false" ng-minlength="6" ng-pattern="/^[0-9]+$/" ng-model="mobile.phoneno" ng-blur="checkmobilePresent()" name="phoneno" ng-disabled="vmobile" required/>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                          <span class="input__label-content input__label-content--hoshi">Enter your Mobile Number*</span>
                        </label>
                      </span>
                    </div>
                    <div class="errorMsg" ng-show="mobile.verifyForm.$submitted || mobile.verifyForm.phoneno.$touched">      
                      <span class="errorMsg" ng-show="mobile.verifyForm.phoneno.$error.required">Please Enter Mobile Number.</span>
                      <div class="errorMsg" ng-show="mobile.verifyForm.phoneno.$error.pattern">Invalid Number.</div> 
                      <div class="errorMsg" ng-show="mobile.verifyForm.phoneno.$error.phonepresent">Phone Number Already Present.</div> 
                      <div class="errorMsg" ng-show="mobile.verifyForm.phoneno.$error.maxlength">Maximum 15 digits.</div>   
                      <div class="errorMsg" ng-show="mobile.verifyForm.phoneno.$error.minlength">Minimum 6 digits.</div> 
                    </div>
                  </div>
                  <input type="submit" class="btn margin-left15 pull-right greenBtn" ng-disabled="mverify" ng-if="otpstepone" ng-click="mobile.verifyForm.$valid ? verifymobile() : ''" value="{{mobileVerify}}" />
                </div>
                <div class="col-md-12">
                  <div ng-class="success ? 'successNew top10' : ''" ng-hide="showClose" class="msgInfo">
                    <p class="msgOnly">{{success}}</p>
                    <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
                  </div>
                  <div ng-class=" errorotp ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
                    <p class="msgOnly">{{errorotp}}</p>
                    <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
                  </div>
                </div>
                <div ng-show="otpsteptwo">
                  <span class="input input--hoshi " >
                    <input class="input__field input__field--hoshi" type="text" ng-model="mobile.otp" maxlength="5" ng-change="checkotp()" name="otp" />
                    <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                      <span class="input__label-content input__label-content--hoshi">Enter OTP*</span>
                    </label>
                    <span class="errorMsg" ng-show="invalidOtp">Please Enter Correct OTP.</span>
                  </span>
                  <div class="errorMsg otpError" ng-show="mobile.verifyForm.$submitted || mobile.verifyForm.otp.$touched">      
                    <span class="errorMsg" ng-show="mobile.verifyForm.otp.$error.required">Please Enter OTP.</span>   
                    <span class="errorMsg" ng-show="mobile.verifyForm.otp.$error.invalidOtp">Please Enter Correct OTP.</span>
                  </div>
                  <input class="btn margin-left15 pull-right greenBtn" ng-click="verifyotp()" value="Verify OTP" type="submit" />
                  <a class="btn margin-left15 pull-right greenBtn" ng-if="countDown < 0" ng-click="resendotp()" href="javascript:void(0)">{{resend}}</a>
                  <input ng-model="countDown" ng-show="timer" class="otptimer" ng-readonly="true"/>
                </div>
              </div>
            </form>
          </div>
        </div>
      </uib-tab>
      <uib-tab index="0" ng-click="getemail()">
        <uib-tab-heading>
          <h5>Email</h5>
          <span><img src="/images/icons/email-icon.png"></span>
          <h5 ng-class="emailVerified == 'VERIFIED' ? 'verified' : 'error'"><i class="fa fa-check" aria-hidden="true" ng-if="emailVerified == 'VERIFIED'"></i>{{emailVerified == 'VERIFIED' ? 'Verified' : 'Not Verified'}}</h5>
        </uib-tab-heading>
        <div class="tabContentIn verifyNumber">
          <div class="col-md-6 col-md-offset-2">                   
            <h4 ng-if="emailVerified == 'VERIFIED'" class="margin-bottom-10">You Have Been Verified.</h4>
            <div class="col-md-12">
              <div ng-class="successmobile ? 'successNew top10' : ''" ng-hide="showClose" class="msgInfo">
                <p class="msgOnly">{{successmobile}}</p>
                <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
              </div>
              <div ng-class=" errormobile ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
                <p class="msgOnly">{{errormobile}}</p>
                <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
              </div>
            </div>
            <form name="email.everifyForm" ng-submit="email.everifyForm.$valid" novalidate ng-if="emailVerified != 'VERIFIED'">
              <div class="emailVerification">
                <h5 class="margin-bottom-10">Verify Your Email address</h5>
                <p>Please verify your registered email address by clicking on the link sent to your email.</p>
                <div class="col-md-12 padding0">
                  <span class="input input--hoshi">
                    <input class="input__field input__field--hoshi ng-pristine ng-empty ng-invalid ng-invalid-required ng-valid-pattern ng-touched" type="text" ng-pattern="/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/" ng-trim="false" ng-model="email.verifyemail" ng-blur="checkemailPresent()" name="verifyemail" required>
                    <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                      <span class="input__label-content input__label-content--hoshi">Email</span>
                    </label>
                    <div ng-show="email.everifyForm.$submitted || email.everifyForm.verifyemail.$touched" class="" style="">      
                      <div class="errorMsg" ng-show="email.everifyForm.verifyemail.$error.required">Please Enter Email.</div>   
                      <div class="errorMsg ng-hide" ng-show="email.everifyForm.verifyemail.$error.pattern">Invalid Email.</div>
                      <div class="errorMsg" ng-show="email.everifyForm.verifyemail.$error.emailpresent">EmailId Already Present.</div>  
                    </div>
                  </span>
                  <div class="col-md-12 padding0 text-right">
                    <input type="submit" class="btn margin-left15 pull-right greenBtn" ng-disabled="everify" ng-click="email.everifyForm.$valid ? verifyemail() : ''" value="{{emailVerify}}" />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </uib-tab>
    </uib-tabset>
  </div>
</div>
