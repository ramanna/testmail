<div class="mainContentIn supportPage">
  <div class="col-md-12 top10">
		<h3 class="pageTitle">Reply</h3>
        <div class="col-md-6 col-md-offset-3">
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
                        <textarea class="input__field input__field--hoshi" name="mailMessage" ng-model="input.mailMessage" required></textarea>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                            <span class="input__label-content input__label-content--hoshi">Message *</span>
                        </label>
                        <div class="errorMsg" ng-show="input.composeMail.$submitted || input.composeMail.mailMessage.$touched">      
                            <span class="error" ng-show="input.composeMail.mailMessage.$error.required">Please Enter Message.</span>
                        </div>
                    </span>

                </div>
                <div class="col-md-12 padding0 attachMent">
                    <div class="ContentIn margin-top-10">
                        Attachment Browse 
                        <input type="file" ng-model="input.attachfile" name="attachfile[]" class="form-control formNoMargin" ng-files="getTheFiles($files)" />
                    </div>
                    <p class="uploadSize">(Upload jpg ,png files only, 2MB Max Size)</p>
                    <div class="" ng-show="input.composeMail.$submitted || input.composeMail.attachfile.$touched"> 
                        <span class="errorMsg" ng-show="input.composeMail.attachfile.$error.maxsize"> Max Upload Size is 2MB</span>
                        <span class="errorMsg" ng-show="input.composeMail.attachfile.$error.filetype"> Unsupported file format</span>
                    </div>
                </div>
                <div class="col-md-12 padding0 attachMent">
                    <input type="submit" ng-click="input.composeMail.$valid ? composeSupportMail() : ''" value="{{buttonval}}" class="btn greenBtn pull-right">
                    <a href="#/inbox" class="btn db-submit  pull-right margin-right5">Cancel</a>
                </div>
            </form>
        </div>
</div>
</div>