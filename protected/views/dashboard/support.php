<div class="mainContentIn supportPage">
  <div class="customTabbed">
	<a class="active" href="#/support"><i class="fa fa-pencil-square-o"></i>COMPOSE</a>
    <a ng-click="getInboxDetails()" href="#/inbox"><i class="fa fa-envelope-o"></i>INBOX</a>
    <a ng-click="getOutboxDetails()" href="#/outbox"><i class="fa fa-paper-plane-o"></i>SENT</a>
  </div>
    <div class="ContentSection ">
        <div class="col-md-6 col-md-offset-3">
            <div ng-class="success ? 'successNew' : ''" class="msgInfo">
                <p class="msgOnly">{{success}}</p>
                <a onclick="successClose()" class="closeBtn" title="close">X</a>
            </div>
            <div ng-class="error ? 'errorNew' : ''" class="msgInfo">
                <p class="msgOnly">{{error}}</p>
                <a onclick="errorClose()" class="closeBtn" title="close">X</a>
            </div>
            <form name="input.composeMail" ng-submit="input.composeMail.$valid" novalidate>
                <select class="form-control" name="departmentName" ng-model="input.departmentName" required>
                    <option value=''>- Please Choose Department -</option>
                    <option ng-repeat="department in departmentJson" value="{{department.id}}">
                        {{department.name}}
                    </option>
                </select>
                <div ng-show="input.composeMail.$submitted || input.composeMail.departmentName.$touched">      
                    <div class="error" ng-show="input.composeMail.departmentName.$error.required">Please Select Department.</div>   
                </div>
                <div class="form-control inputField">
                    <span class="input input--hoshi">
                        <input class="input__field input__field--hoshi" ng-readonly="truefalse" ng-maxlength="30" type="text" name="subject" ng-model="input.subject" required>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                            <span class="input__label-content input__label-content--hoshi">Subject *</span>
                        </label>
                        <div class="errorMsg" ng-show="input.composeMail.$submitted || input.composeMail.subject.$touched">      
                            <span class="error" ng-show="input.composeMail.subject.$error.required">Please Enter Subject.</span>   
                        </div>
                    </span>

                    <span class="error" ng-show="input.composeMail.subject.$error.maxlength">
                        Too long! Max 30 character
                    </span>
                </div>
                <div class="form-control inputField textareaField">
                    <span class="input input--hoshi">
                        <textarea class="input__field input__field--hoshi" name="mailMessage" ng-model="input.mailMessage" ng-maxlength="1000" required></textarea>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                            <span class="input__label-content input__label-content--hoshi">Message *</span>
                        </label>
                        <div class="" ng-show="input.composeMail.$submitted || input.composeMail.mailMessage.$touched">      
                            <span class="errorMsg" ng-show="input.composeMail.mailMessage.$error.required">Please Enter Message.</span>
                            <span class="errorMsg" ng-show="input.composeMail.mailMessage.$error.maxlength">Max length is 1000.</span>
                        </div>
                    </span>
                </div>
                <div class="col-md-12 padding0 attachMent">
                    <div class="ContentIn margin-top-10">
                        Attachment Browse 
                        <i class="fa fa-times-circle attachClose" ng-show="false"></i>
                        <input type="file" ng-model="input.attachfile" name="attachfile" class="form-control formNoMargin" ng-file="getTheFiles($files)"/>
                    </div>
                    <p class="uploadSize">(Upload jpg ,png files only, 2MB Max Size)</p>
                    <div id="supportproofImg" class="errorMsg"></div>
                    <div id="supportprooftype" class="errorMsg"> </div>
                    <div class="" ng-show="input.composeMail.$submitted || input.composeMail.attachfile.$touched"> 
                    <span class="errorMsg" ng-show="input.composeMail.attachfile.$error.maxsize"> Max Upload Size is 2MB</span>
                    <span class="errorMsg" ng-show="input.composeMail.attachfile.$error.filetype"> Unsupported file format</span>
                    </div>
                </div>
                <div class="col-md-12 padding0 attachMent">
                    <input type="submit" ng-click="input.composeMail.$valid ? composeSupportMail() : ''" id="composeMail" ng-disabled="support" value="{{buttonval}}" class="btn greenBtn pull-right">
                </div>
            </form>
        </div>
    </div>
</div>

