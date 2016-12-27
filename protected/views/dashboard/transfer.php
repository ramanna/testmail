<div class="mainContentIn" > 
    <input type="hidden" id="validate_transaction_password" name="validate_transaction_password" value="{{istransactionEnabled}}"/>
    <input type="hidden" id="is_transaction_password_valid" name="is_transaction_password_valid" value="{{istransactionEnabled}}"/>
    <div class="ContentSection fundTransfer" >
        <div class="toeLoader" ng-if="!ifsc"><i class="fa fa-refresh fa-spin fa-2x"></i></div>
        <div class="toeLoader" ng-if="!walletList"><i class="fa fa-refresh fa-spin fa-2x"></i></div>
        <div class="sendReceive">
            <div class="col-md-12">
                <div class="tableStructure">
                    <div class="row">
                        <div class="col-md-2 padding-right0 padding-left0">
                            <div class="currencyTxt">
                                <span><i class="fa fa-btc" aria-hidden="true"></i></span>
                                <span>BTC Wallet<br><small>{{btcLabel}}</small></span>
                            </div>
                        </div> 
                        <div class="col-md-3 Amount">{{btc| number:8}} BTC</div>
                        <div class="col-md-7 sendReceiveBtns text-right">
                            <div ng-if="btcwallet == 0" >
                                <a href="javascript:void(0)" class="btn pull-right greenBtn" ng-click="createWallet('BTC');"> <span>+</span> Create New Wallet</a>
                            </div>
                            <div ng-if="btcwallet == 1">
                                <a href="javascript:void(0);" title="Transfer" class="greenBrdr" ng-click="toggleTransfer('btc')">Transfer</a>
                                <a href="javascript:void(0);" title="Create T-voucher" ng-click="toggleVoucher(40)" class="greenBrdr">Create T-voucher</a>
                            </div>   
                        </div>
                        <div class="transferBlock" id="transfer_btc" ng-form="btcForm" >
                            <div class="sendBlockIn col-md-12 padding0 form-group">
                                <form action="#" id="transfer_btc_frm">
                                    <div class="col-md-6 col-md-offset-3 padding-right0">
                                        <p class="inTitle">You Send</p>
                                        <div class="msgInfo successNew top10"  style="display:none">
                                            <p class="msgOnly" id="transfer_success_40"></p>
                                            <a onclick="successCloseNew()" href="javascript:void(0)">X</a>
                                        </div>
                                        <div class="msgInfo errorNew top10"  style="display:none">
                                            <p class="msgOnly" id="transfer_error_40"></p>
                                            <a onclick="errorCloseNew()" href="javascript:void(0)">X</a>
                                        </div>
                                        <div ng-class="btcSuccess ? 'successNew top10' : ''" ng-hide="showClose" class="msgInfo">
                                            <p class="msgOnly">{{btcSuccess}}</p>
                                            <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
                                        </div>
                                        <div ng-class="btcError ? 'errorNew top10' : ''" ng-hide="showClose" class="msgInfo">
                                            <p class="msgOnly">{{btcError}}</p>
                                            <a ng-click="onClickClose($event)" href="javascript:void(0)">X</a>
                                        </div>
                                        <div class="col-md-12 padding0">
                                            <span class="input input--hoshi">
                                                <input class="inputClass input__field input__field--hoshi" maxlength="35" name="walletId" ng-model="wallet.btcaddress" ng-change="isBtcAddressValid($event);"/>
                                                <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                    <span class="input__label-content input__label-content--hoshi">Enter BTC Wallet or Address</span>
                                                </label>
                                                <span class="inputInfo1" ng-show="btcForm.walletId.$dirty && btcForm.walletId.$invalid">
                                                    <span ng-show="btcForm.walletId.$error.maxlength">This field is required</span>
                                                </span>
                                                <span class="inputInfo1 error"></span><span class="success-msg">{{btcUserName}}</span>
                                            </span>
                                        </div>
                                        <div class="col-md-12 padding0">
                                            <span class="input input--hoshi">
                                                <input  class="inputClass input__field input__field--hoshi" maxlength="5" type="text" name="amount" ng-model="wallet.amount" ng-keyup="getExchangePrice()"/>
                                                <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                    <span class="input__label-content input__label-content--hoshi">Amount</span>
                                                </label>
                                                <select class="btcAmount"  ng-model="given_currency" ng-options="option.name for option in currency"  ng-change="getExchangePrice()"></select>
                                            </span> 
                                            <span class="inputInfo1 error">{{topayAmount ? 'Your Sending: '+topayAmount+' BTC' : ''}}</span>
                                        </div>
                                        <div ng-if="istransactionEnabled == 1" class="col-md-12 padding0" id="transaction_password_div_40">
                                            <span class="input input--hoshi">
                                                <input type="password" maxlength="15" class="inputClass input__field input__field--hoshi" id="transaction_password_transfer_40" name="transaction_password_transfer" ng-model="wallet.transaction_password_transfer" ng-change="verifyTransactionPassword(wallet.currency_id, wallet.transaction_password_transfer, 'transfer_error_', 'transfer')" />
                                                <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                    <span class="input__label-content input__label-content--hoshi">Transaction Password</span>
                                                </label>
                                            </span>    
                                        </div>
                                        <div class="col-md-12 padding0 margin-top-10">
                                            <input class="btn btn-block greenBtn sendRequest" id="transfer_button_btc" type="submit" ng-click="transferBtc(wallet)" value="Transfer" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="withdrawBlock" id="withdraw_40" ng-form="withdrawForm">
                            <div class="sendBlockIn col-md-12 padding0 form-group">
                                <div class="col-md-6 col-md-offset-3 padding-right0">
                                    <p class="inTitle">You Receive</p>
                                    <div class="msgInfo successNew top10"  style="display:none">
                                        <p class="msgOnly" id="withdraw_success_40"></p>
                                        <a onclick="successCloseNew()" href="javascript:void(0)">X</a>
                                    </div>
                                    <div class="msgInfo errorNew top10"  style="display:none">
                                        <p class="msgOnly" id="withdraw_error_40"></p>
                                        <a onclick="errorCloseNew()" href="javascript:void(0)">X</a>
                                    </div>
                                    <div class="col-md-12 padding0">
                                        <div class="selectDrop">
                                            <ui-select ng-change="currencyDetails(40);" ng-model="person.selected" theme="select2" >
                                                <ui-select-match placeholder="Select E-Currency" value="{{currency.id}}"><img ng-src="/currency_logo/{{ $select.selected.image}}" /> {{$select.selected.name}}</ui-select-match>
                                                <ui-select-choices repeat="currency in currencyMappingList | propsFilter: {name: $select.search, age: $select.search}">
                                                    <img ng-src="/currency_logo/{{ currency.image}}" />
                                                    <div ng-bind-html="currency.name | highlight: $select.search" style="display: inline"></div>
                                                    <div ng-bind-html="currency.id" style="display: none"></div>                                                            
                                                    <div ng-bind-html="currency.toSlug" style="display: none"></div>                                                            
                                                    <div ng-bind-html="'Fees: ' + currency.fee + '%'" class="pull-right" style="display: inline"></div>
                                                </ui-select-choices>
                                            </ui-select> 
                                        </div>
                                    </div>
                                    <div class="col-md-12 padding0">
                                        <span class="input input--hoshi">
                                            <input type="text" maxlength="50" class="inputClass input__field input__field--hoshi" id="accontNumber_40"  name="acNumer" ng-model="withdraw.account"   />
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                <span class="input__label-content input__label-content--hoshi" >Account Number</span>
                                            </label>                                                
                                        </span>
                                        <span class="error ng-binding charges" id="account_error_40"></span>
                                        <div class="" id="accountInfo_40"></div>
                                        <span class="infoIcon"><i tooltip-placement="top" data-uib-tooltip-html="tooltip" class="glyphicon glyphicon-info-sign"></i></span>
                                    </div>
                                    <div class="col-md-12 padding0">
                                        <span class="input input--hoshi">
                                            <input type="text" maxlength="5" class="inputClass input__field input__field--hoshi" id="amount_40" name="amount" ng-model="withdraw.amount" ng-keyup="getAmountFee(withdraw.amount, 40, $select.selected.name, 'withdraw')" onkeyup="filterFloat(this.value, 'amount_', 40)" autocomplete="off" />
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                <span class="input__label-content input__label-content--hoshi" >Amount</span>
                                            </label>
                                            <div class="currencyType">BTC</div>
                                        </span>
                                        <span class="FeeDetails" id="withdraw_fee_40"></span>
                                        <span class="FeeDetails" id="withdraw_amount_40"></span>
                                    </div>
                                    <div class="col-md-12 padding0">
                                        <span class="input input--hoshi">
                                            <input class="inputClass input__field input__field--hoshi" type="text" maxlength="50" ng-model="withdraw.msg" />
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                <span class="input__label-content input__label-content--hoshi" >Message</span>
                                            </label>
                                        </span>
                                    </div>
                                    <div ng-if="istransactionEnabled == 1" class="col-md-12 padding0" id="transaction_password_div_40">
                                        <span class="input input--hoshi">
                                            <input type="password" maxlength="15" class="inputClass input__field input__field--hoshi" id="transaction_password_withdraw_40" name="transaction_password_withdraw" ng-model="withdraw.transaction_password_withdraw" ng-change="verifyTransactionPassword(40, withdraw.transaction_password_withdraw, 'withdraw_error_', 'withdraw')" />
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                <span class="input__label-content input__label-content--hoshi">Transaction Password</span>
                                            </label>
                                        </span>    
                                    </div>
                                    <div class="col-md-12 padding0 margin-top-10">
                                        
                                        <input class="btn btn-block greenBtn sendRequest" id="withdraw_button_40" type="submit" ng-click="withdrawRequest(withdraw, 40)" value="Submit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="createVoucherBlock" id="createVoucher_40"  ng-form="tvoucher">
                            <div class="VoucherDetails sendBlockIn col-md-12 padding0 form-group" style="display: none;" id="voucher_success_block_40">
                                <div class="col-md-9 col-md-offset-3 padding-right0">
                                    <div class="msgInfo successNew top10" style="display:none">
                                        <p class="msgOnly" id="tvoucher_success_40"></p>
                                        <a onclick="successCloseNew()" href="javascript:void(0)">X</a>
                                    </div>
                                    <div class="text-center" id="targettext_40">
                                        <div class="voucherDetails">
                                            <span class="first">Voucher Code</span>
                                            <span class="verified voucher-data" id="vcode_40"></span>
                                        </div>
                                        <div class="voucherDetails">
                                            <span class="first">Amount</span>
                                            <span class="verified voucher-data" id="vamount_40"></span>
                                        </div>
                                        <button class="greenBtn " id="copyButton40" value="40" onclick="copyToText(this.value)">Copy Voucher</button>
                                    </div>
                                </div>
                            </div>
                            <div class="sendBlockIn col-md-12 padding0 form-group"  id="voucher_form_40">
                                <div class="col-md-6 col-md-offset-3 padding-right0">
                                    <p class="inTitle">Create Voucher</p>
                                    <div class="msgInfo errorNew top10"  style="display:none">
                                        <p class="msgOnly" id="tvoucher_error_40"></p>
                                        <a onclick="errorCloseNew()" href="javascript:void(0)">X</a>
                                    </div>
                                    <div class="col-md-12 padding0">
                                        <span class="input input--hoshi">
                                            <input type="text" autocomplete="off" maxlength="8" class="inputClass input__field input__field--hoshi" id="tvoucher_amount_40" name="amount_40" ng-model="tvoucherbtc.amount" onkeyup="filterFloat(this.value, 'tvoucher_amount_', 40)" ng-keyup="getToPayAmount(tvoucher.amount, 40)" />
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                <span class="input__label-content input__label-content--hoshi">Amount</span>
                                            </label>
                                            <div class="currencyType">BTC</div>
                                        </span>
                                        <span class="FeeDetails" id="voucher_fee_40"></span>
                                        <span class="FeeDetails" id="voucher_amount_40"></span>
                                    </div>
                                    <div class="col-md-12 padding0">
                                        <span class="input input--hoshi">
                                            <input type="text" maxlength="50" class="inputClass input__field input__field--hoshi" name="msg" ng-model="tvoucher1.msg" />
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                <span class="input__label-content input__label-content--hoshi">Notes (Optional)</span>
                                            </label>
                                        </span>
                                    </div>
                                    <div ng-if="istransactionEnabled == 1" class="col-md-12 padding0" id="transaction_password_div_40">
                                        <span class="input input--hoshi">
                                            <input type="password" maxlength="15" class="inputClass input__field input__field--hoshi" id="transaction_password_tvoucher_40" name="transaction_password_tvoucher" ng-model="tvoucherbtc.transaction_password_tvoucher" ng-change="verifyTransactionPassword(40, tvoucherbtc.transaction_password_tvoucher, 'tvoucher_error_', 'tvoucher')" />                                                                                                                                                                    
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                <span class="input__label-content input__label-content--hoshi">Transaction Password</span>
                                            </label>
                                        </span>    
                                    </div>
                                    <div class="col-md-12 padding0 margin-top-10">
                                        <input class="btn btn-block greenBtn sendRequest" id="tvoucher_button_40" type="submit" ng-click="tvoucherRequest(tvoucherbtc, 40)" value="Create Voucher" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row"  ng-repeat="wallet in walletList" ng-if="wallet.code != 'BTC'">
                        <div class="col-md-2 padding-left0">
                            <div class="currencyTxt">
                                <span><i class="fa fa-{{ wallet.slug | limitTo:3 }}" aria-hidden="true"></i></span>
                                <span>{{wallet.name}} <br><small>{{wallet.ref_id}}</small></span>
                            </div>
                        </div>
                        <div class="col-md-3 Amount"> <div ng-if="wallet.amount"> <span id="wallet_balance_{{wallet.currency_id}}">{{wallet.amount| number:2}} </span>{{wallet.code}}</div></div>
                        <div class="col-md-7 sendReceiveBtns text-right">
                            <div ng-if="!wallet.currency_id" >
                                <a class="greenBtn btn-ripple-out" href="javascript:void(0)" ng-click="createWallet(wallet.code);">+ Create Wallet</a>
                            </div>
                            <div ng-if="wallet.currency_id">
                                <a href="javascript:void(0);" title="Transfer" class="greenBrdr" ng-click="toggleTransfer(wallet.currency_id)">Transfer</a>
                                <a href="javascript:void(0);" title="Withdraw" class="greenBrdr" ng-click="toggleWithdraw(wallet.currency_id)" >Withdraw</a>
                                <a href="javascript:void(0);" title="Create T-voucher" ng-click="toggleVoucher(wallet.currency_id)" class="greenBrdr">Create T-voucher</a>
                            </div>    
                        </div>   
                        <div ng-if="wallet.currency_id" >
                            <div class="transferBlock" id="transfer_{{wallet.currency_id}}" ng-form="cellForm">
                                <div class="sendBlockIn col-md-12 padding0 form-group">
                                    <form action="#" id="trans_{{wallet.currency_id}}">
                                        <div class="col-md-6 col-md-offset-3 padding-right0">
                                            <p class="inTitle">You Send</p>
                                            <div class="msgInfo successNew top10"  style="display:none">
                                                <p class="msgOnly" id="transfer_success_{{wallet.currency_id}}"></p>
                                                <a onclick="successCloseNew()" href="javascript:void(0)">X</a>
                                            </div>
                                            <div class="msgInfo errorNew top10"  style="display:none">
                                                <p class="msgOnly" id="transfer_error_{{wallet.currency_id}}"></p>
                                                <a onclick="errorCloseNew()" href="javascript:void(0)">X</a>
                                            </div>
                                            <div class="col-md-12 padding0">
                                                <span class="input input--hoshi">
                                                    <input class="inputClass input__field input__field--hoshi" maxlength="15" name="ref_id" ng-model="wallet[$index].ref_id" ng-change="checkingAdrress(wallet[$index].ref_id, wallet.currency_id);" onkeypress="return isSpace(event)"/>
                                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">Enter Wallet Address</span>
                                                    </label>
                                                    <span class="userNameInfo" id="ref_address_{{wallet.currency_id}}"></span>
                                                </span>
                                                <span class="infoIcon">
                                                    <i tooltip-placement="top" uib-tooltip="{{wallet.info}}" class="glyphicon glyphicon-info-sign"></i>
                                                </span>
                                            </div>
                                            <div class="col-md-12 padding0">
                                                <span class="input input--hoshi">
                                                    <input autocomplete="off"  class="inputClass input__field input__field--hoshi" maxlength="10" type="text" name="amount" ng-model="wallet[$index].amount" onkeypress="return isNumber(event)" ng-keyup="getAmountFee(wallet[$index].amount, wallet.currency_id, wallet.currency_id)" />
                                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">Amount</span>
                                                    </label>
                                                    <div class="currencyType">{{wallet.code}}</div>
                                                </span>
                                                <span class="FeeDetails" id="transfer_fee_{{wallet.currency_id}}"></span>
                                                <span class="FeeDetails" id="transfer_amount_{{wallet.currency_id}}"></span>
                                            </div>
                                            <div class="col-md-12 padding0">
                                                <span class="input input--hoshi">
                                                    <input class="inputClass input__field input__field--hoshi" type="text" maxlength="50" ng-model="wallet[$index].msg" />
                                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi" >Notes (Optional)</span>
                                                    </label>
                                                </span>
                                                <span class="error ng-binding" ng-if="wallet.fee">fees: {{wallet.fee}}%</span>
                                            </div> 
                                            <div ng-if="istransactionEnabled == 1" class="col-md-12 padding0" >
                                                <span class="input input--hoshi">
                                                    <input type="password" maxlength="15" class="inputClass input__field input__field--hoshi" id="transaction_password_transfer_{{wallet.currency_id}}" name="transaction_password_transfer" ng-model="wallet[$index].transaction_password_transfer" ng-change="verifyTransactionPassword(wallet.currency_id, wallet[$index].transaction_password_transfer, 'transfer_error_', 'transfer')" />
                                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">Transaction Password</span>
                                                    </label>
                                                </span>    
                                            </div>
                                            <div class="col-md-12 padding0 margin-top-10">
                                                <input class="btn btn-block greenBtn sendRequest" id="transfer_button_{{wallet.currency_id}}" type="submit" ng-click="amountTransfer(wallet[$index], wallet.currency_id)" value="Transfer" />
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                            
                            <div class="withdrawBlock aaaaaaaa" id="withdraw_{{wallet.currency_id}}" ng-form="withdrawForm">
                                
                                <div ng-if="documnetStatusResponse == 1">
                                
                                <div class="sendBlockIn col-md-12 padding0 form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="msgInfo successNew top10"  style="display:none">
                                            <p class="msgOnly" id="withdraw_success_{{wallet.currency_id}}"></p>
                                            <a onclick="successCloseNew()" href="javascript:void(0)">X</a>
                                        </div>
                                        <div class="msgInfo errorNew top10"  style="display:none">
                                            <p class="msgOnly" id="withdraw_error_{{wallet.currency_id}}"></p>
                                            <a onclick="errorCloseNew()" href="javascript:void(0)">X</a>
                                        </div>
                                    </div>
                                    <div class="withdrawIn">
                                        <div class="col-md-6 col-md-offset-3 padding-right0">
                                            <p class="inTitle">You Receive</p>                                                
                                            
                                            <div class="col-md-12 padding0">
                                                <div class="selectDrop">
                                                    <ui-select ng-model="banklist.selected" theme="select2" >
                                                        <ui-select-match placeholder="Select Bank Name" value="5">{{$select.selected.account_number}} </ui-select-match>
                                                        <ui-select-choices repeat="userBank in userBankList">
                                                            <div ng-bind-html="userBank.title + ' ' + userBank.account_number  | highlight: $select.search" style="display: inline"></div>
                                                            <div ng-bind-html="userBank.title + ' ' + userBank.account_number" style="display: none"></div>
                                                            <div ng-bind-html="userBank.bank_id" style="display: none"></div>
                                                        </ui-select-choices>
                                                    </ui-select> 
                                                </div>
                                            </div>
                                            <div class="col-md-12 padding0">
                                                <span class="input input--hoshi">
                                                    <input type="text" maxlength="10" class="inputClass input__field input__field--hoshi" id="amount_{{wallet.currency_id}}" name="amount" ng-model="withdraw[$index].amount" onkeypress="return isNumber(event)" ng-keyup="getAmountFee(withdraw[$index].amount, wallet.currency_id, $select.selected.name, 'withdraw')" />
                                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi" >Amount</span>
                                                    </label>
                                                    <div class="currencyType">{{wallet.code}}</div>
                                                </span>
                                                <span class="FeeDetails" id="withdraw_fee_{{wallet.currency_id}}"></span>
                                                <span class="FeeDetails" id="withdraw_amount_{{wallet.currency_id}}"></span>
                                            </div>
                                            <div class="col-md-12 padding0">
                                                <span class="input input--hoshi">
                                                    <input class="inputClass input__field input__field--hoshi" type="text" maxlength="50" ng-model="withdraw[$index].msg" />
                                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi" >Message</span>
                                                    </label>
                                                </span>
                                            </div>
                                            <div ng-if="istransactionEnabled == 1" class="col-md-12 padding0" id="transaction_password_div_{{wallet.currency_id}}">
                                                <span class="input input--hoshi">
                                                    <input type="password" maxlength="15" class="inputClass input__field input__field--hoshi" id="transaction_password_withdraw_{{wallet.currency_id}}" name="transaction_password_withdraw" ng-model="withdraw[$index].transaction_password_withdraw" ng-change="verifyTransactionPassword(wallet.currency_id, withdraw[$index].transaction_password_withdraw, 'withdraw_error_', 'withdraw')" />                                                                                                                                                                    
                                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                        <span class="input__label-content input__label-content--hoshi">Transaction Password</span>
                                                    </label>
                                                </span>    
                                            </div>
                                            <div class="col-md-12 padding0 margin-top-10">
                                                <input class="btn btn-block greenBtn sendRequest" id="withdraw_button_{{wallet.currency_id}}" type="submit" ng-click="withdrawRequest(withdraw[$index], wallet.currency_id)" value="Submit" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="greenBtn addBank">+ BANK ACCOUNT</a>
                                        </div>
                                    </div>
                                    <div class=" clearfix" style="display: block">
                                        <div class="TabbedContent tab-content twoColumns clearfix">
                                            <div class="bankDetails form-group">
                                                <div class="col-md-6">
                                                    <span class="input input--hoshi">
                                                        <input maxlength="20" ng-model="binfo[$index].accountTitle" name="accountTitle" id="accounttitle_{{wallet.currency_id}}" class="input__field input__field--hoshi" type="text"/>
                                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                            <span class="input__label-content input__label-content--hoshi">Title (Optinol)</span>
                                                        </label>
                                                        <span class="infoIcon">
                                                            <i tooltip-placement="left" uib-tooltip="Title" class="glyphicon glyphicon-info-sign"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <span class="input input--hoshi">
                                                        <input maxlength="16" type="text" class="inputClass input__field input__field--hoshi" id="accountNumber_{{wallet.currency_id}}" name="accountNumber" ng-model="binfo[$index].accountNumber" ng-change="checkingAccountNumber(binfo[$index].accountNumber, 'withdraw_error_', wallet.currency_id)" onkeypress="return isNumber(event)" />
                                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                            <span class="input__label-content input__label-content--hoshi">Account Number*</span>
                                                        </label>
                                                        <span class="infoIcon">
                                                            <i tooltip-placement="left" uib-tooltip="SWIFT / BIC /IFSC code associated with your bank." class="glyphicon glyphicon-info-sign"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="input input--hoshi">
                                                        <input maxlength="20" ng-model="binfo[$index].accountName" name="accountName" id="accountName_{{wallet.currency_id}}" class="input__field input__field--hoshi" type="text" />
                                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                            <span class="input__label-content input__label-content--hoshi">Account Name*</span>
                                                        </label>
                                                        <span class="infoIcon">
                                                            <i tooltip-placement="left" uib-tooltip="Account name as mentioned in your bank." class="glyphicon glyphicon-info-sign"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="input input--hoshi">
                                                        <input type="text" maxlength="15" class="inputClass input__field input__field--hoshi " id="ifsc_{{wallet.currency_id}}" name="ifsc" ng-model="binfo[$index].ifsc" ng-change="checkIfsc(binfo[$index].ifsc, 'withdraw_error_', wallet.currency_id)" onkeypress="return isSpace(event)"/>
                                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                            <span class="input__label-content input__label-content--hoshi">Bank SWIFT / BIC / IFSC code *</span>
                                                        </label>
                                                        <span class="infoIcon">
                                                            <i tooltip-placement="left" uib-tooltip="Full Bank Account Number/IBAN." class="glyphicon glyphicon-info-sign"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="input input--hoshi">
                                                        <input ng-model="binfo[$index].bankName" name="bankName" class="input__field input__field--hoshi ifscinfo" id="bankName_{{wallet.currency_id}}" type="text"  readonly=""/>
                                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                            <span class="input__label-content input__label-content--hoshi">Bank Name</span>
                                                        </label>
                                                        <span class="infoIcon">
                                                            <i tooltip-placement="left" uib-tooltip="Bank Name." class="glyphicon glyphicon-info-sign"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="input input--hoshi">
                                                        <input ng-model="binfo[$index].branchName" name="branchName" class="input__field input__field--hoshi ifscinfo" type="text" id="branchName_{{wallet.currency_id}}" type="text" readonly=""/>
                                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                            <span class="input__label-content input__label-content--hoshi">Branch Name</span>
                                                        </label>
                                                        <span class="infoIcon">
                                                            <i tooltip-placement="left" uib-tooltip="Branch Name." class="glyphicon glyphicon-info-sign"></i>
                                                        </span>
                                                    </span>

                                                </div>
                                                <div class="col-md-6">
                                                    <span class="input input--hoshi">
                                                        <textarea ng-model="binfo[$index].branchAddress" name="bankAddress" class="input__field input__field--hoshi ifscinfo" id="bankAddess_{{wallet.currency_id}}" readonly=""></textarea>
                                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                            <span class="input__label-content input__label-content--hoshi">Address</span>
                                                        </label>
                                                        <span class="infoIcon">
                                                            <i tooltip-placement="left" uib-tooltip="Bank Address." class="glyphicon glyphicon-info-sign"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <a class="showwitdraw"><< Back to Withdraw</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="hidden" id="is_accnumber_valid_{{wallet.currency_id}}" value="1">
                                                    <input type="hidden" id="is_ifsc_valid_{{wallet.currency_id}}" value="1">
                                                    <input class="btn btn-default btn-block btn-submit sendRequest" type="submit" ng-click="addBankInfo(binfo[$index], 'withdraw_error_', wallet.currency_id)" value="Save Bank Details" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                </div>
                                <div ng-if="documnetStatusResponse == 0">
                                    <p class="error errorMsg clearfix"> Your account is not verified. Please verify your account after that you can do withdraw.<a href="/dashboard#/verification"> Click Here for verification</a></p>
                                </div>    
                                
                            </div>
                            
                            <div class="createVoucherBlock" id="createVoucher_{{wallet.currency_id}}"  ng-form="tvoucher">
                                <div class="VoucherDetails sendBlockIn col-md-12 padding0 form-group" style="display: none;" id="voucher_success_block_{{wallet.currency_id}}">
                                    <div class="col-md-9 col-md-offset-3 padding-right0">
                                        <div class="msgInfo successNew top10"  style="display:none">
                                            <p class="msgOnly" id="tvoucher_success_{{wallet.currency_id}}"></p>
                                            <a onclick="successCloseNew()" href="javascript:void(0)">X</a>
                                        </div>
                                        <div class="text-center" id="targettext_{{wallet.currency_id}}">
                                            <div class="voucherDetails">
                                                <span class="first">Voucher Code</span>
                                                <span class="verified voucher-data" id="vcode_{{wallet.currency_id}}"></span>
                                            </div>
                                            <div class="voucherDetails">
                                                <span class="first">Amount</span>
                                                <span class="verified voucher-data" id="vamount_{{wallet.currency_id}}"></span>
                                            </div>
                                            <button class="greenBtn " id="copyButton{{wallet.currency_id}}" value="{{wallet.currency_id}}" onclick="copyToText(this.value)">Copy Voucher</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="sendBlockIn col-md-12 padding0 form-group"  id="voucher_form_{{wallet.currency_id}}">
                                    <div class="col-md-6 col-md-offset-3 padding-right0">
                                        <p class="inTitle">Create Voucher</p>
                                        <div class="msgInfo errorNew top10"  style="display:none">
                                            <p class="msgOnly" id="tvoucher_error_{{wallet.currency_id}}"></p>
                                            <a onclick="errorCloseNew()" href="javascript:void(0)">X</a>
                                        </div>
                                        <div class="col-md-12 padding0">
                                            <span class="input input--hoshi">
                                                <input type="text" autocomplete="off" maxlength="5" class="inputClass input__field input__field--hoshi" id="amount_{{wallet.currency_id}}" name="amount" ng-model="tvoucher[$index].amount" onkeypress="return isNumber(event)" ng-keyup="getToPayAmount(tvoucher[$index].amount, wallet.currency_id)" />
                                                <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                    <span class="input__label-content input__label-content--hoshi">Amount</span>
                                                </label>
                                                <div class="currencyType">{{wallet.code}}</div>
                                            </span>
                                            <span class="FeeDetails" id="voucher_fee_{{wallet.currency_id}}"></span>
                                            <span class="FeeDetails" id="voucher_amount_{{wallet.currency_id}}"></span>
                                        </div>
                                        <div class="col-md-12 padding0">
                                            <span class="input input--hoshi">
                                                <input type="text" maxlength="50" class="inputClass input__field input__field--hoshi" name="msg" ng-model="tvoucher[$index].msg" />
                                                <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                    <span class="input__label-content input__label-content--hoshi">Notes (Optional)</span>
                                                </label>
                                            </span>
                                            <span class="error ng-binding" ng-if="wallet.fee">fees: {{currencyFee}}%</span>
                                        </div>
                                        <div ng-if="istransactionEnabled == 1" class="col-md-12 padding0" id="transaction_password_div_{{wallet.currency_id}}">
                                            <span class="input input--hoshi">
                                                <input type="password" maxlength="15" class="inputClass input__field input__field--hoshi" id="transaction_password_tvoucher_{{wallet.currency_id}}" name="transaction_password_tvoucher" ng-model="tvoucher[$index].transaction_password_tvoucher" ng-change="verifyTransactionPassword(wallet.currency_id, tvoucher[$index].transaction_password_tvoucher, 'tvoucher_error_', 'tvoucher')" />                                                                                                                                                                    
                                                <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                    <span class="input__label-content input__label-content--hoshi">Transaction Password</span>
                                                </label>
                                            </span>    
                                        </div>
                                        <div class="col-md-12 padding0 margin-top-10">
                                            <input class="btn btn-block greenBtn sendRequest" id="tvoucher_button_{{wallet.currency_id}}" type="submit" ng-click="tvoucherRequest(tvoucher[$index], wallet.currency_id)" value="Create Voucher" />
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
</div>