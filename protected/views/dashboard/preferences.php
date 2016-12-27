<div class="mainContentIn preferencePage"> 
    <div class="customTabbed">
        <a class="active" ng-click="getEcurrencyDetails()" href="#/preferences">E-Currency Accounts</a>
        <a ng-click="getBankDetails()" href="#/bankaccounts">BANK ACCOUNTS</a>
    </div>
    <div class="col-md-12">
        <div ng-class="successAccount ? 'successNew top10' : ''" ng-hide="showClose" class="msgInfo">
            <p class="msgOnly">{{successAccount}}</p>
            <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
        </div>
        <div ng-class="errorAccount ? 'errorNew top10' : ''" ng-hide="showClose"class="msgInfo">
            <p class="msgOnly">{{errorAccount}}</p>
            <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
        </div>
    </div>
    <form name="account.nestedForm" ng-submit="account.nestedForm.$valid" novalidate>
        <div class="TabbedContent tab-content twoColumns clearfix">
            <div class="preference form-group" >
                <input type="hidden" ng-model="account.checkVal" name="checkVal" />
                <div ng-repeat="currency in currencyJson">
                    <div class="col-md-6">
                        <span class="input input--hoshi" ng-class="account.curreny_class[currency.id]">
                            <input class="input__field input__field--hoshi" type="text" ng-trim="false" ng-click="checkVal()" name="curreny_account_{{currency.id}}" id="curreny_account_{{currency.id}}" ng-change="getCurrencyValidation(currency.slug, currency.id)" ng-model="account.curreny_account[currency.id]" required/>
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                <span class="input__label-content input__label-content--hoshi">{{currency.name}}</span>
                            </label>
                            <div ng-show="account.nestedForm.curreny_account_{{currency.id}}.$touched">      
                                <div class="errorMsg" ng-show="account.nestedForm.curreny_account_{{currency.id}}.$error.required">Please Enter {{currency.name}} Account Number.</div>   
                            </div>
                            <span class="errorMsg" id="currency_account_error_{{currency.slug}}"></span>
                        </span>
                        <span class="infoIcon">
                            <i tooltip-placement="left" uib-tooltip="{{currency.info != '' && currency.info != null ? currency.info : 'Account details'}}" class="glyphicon glyphicon-info-sign"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="submit" ng-disabled="preDisable" ng-click="addEcurrencyAccount(account.nestedForm)" value="{{buttonval}}" class="btn btn-default btn-block btn-submit">
                </div>
            </div>
        </div>
    </form>
</div>