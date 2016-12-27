<div class="mainContentIn" > 
    <div class="ContentSection depositPage" >
        <div class="toeLoader" ng-if="!walletList"><i class="fa fa-refresh fa-spin fa-2x"></i></div>
        <div class="sendReceive">
            <div class="col-md-12">
                <div class="tableStructure">
                    <div class="item bitCoin"><span class="success-msg">{{walletsuccess}}</span></div>
                    <input type="hidden" id="validate_transaction_password" name="validate_transaction_password" value="{{istransactionEnabled}}"/>
                    <input type="hidden" id="is_transaction_password_valid" name="is_transaction_password_valid" value="{{istransactionEnabled}}"/>
                    <!--checkout view code end-->
                    <!-- Wallet list Only for Bit Coin -->
                    <div id="paymentGatewayFrm" style="display: none;"></div>
                    <div class="row"  ng-repeat="wallet in walletList">
                        <div class="col-md-3 padding-left0">
                            <div class="currencyTxt">
                                <span><i class="fa fa-{{ wallet.slug | limitTo:3 }}" aria-hidden="true"></i></span>
                                <span>{{wallet.name}} <br><small>{{wallet.ref_id}}</small></span>
                            </div>
                        </div>
                        <div class="col-md-3 Amount"> 
                            <div ng-if="wallet.amount">
                                <div ng-if="wallet.currency_id == 40">{{wallet.amount}}</div>
                                <div ng-if="wallet.currency_id != 40">{{wallet.amount| number:2}}</div>
                                {{wallet.code}}
                            </div>
                        </div>
                        <div class="col-md-6 sendReceiveBtns text-right">
                            <div ng-if="!wallet.currency_id" >
                                <a class="greenBtn btn-ripple-out" href="javascript:void(0)" ng-click="createWallet(wallet.code);">+ Create Wallet</a>
                            </div>
                            <div ng-if="wallet.currency_id">
                                <a href="javascript:void(0);" title="Deposit" class="greenBrdr" ng-click="depositFund('deposit_', wallet.currencyId)">Deposit</a>
                                <a href="javascript:void(0);" title="Reedem T-voucher" ng-click="depositFund('redeem_', wallet.currencyId)" class="greenBrdr">Redeem Voucher</a>
                            </div>    
                        </div>
                        <div ng-if="wallet.currency_id">
                            <div class="depositfund" style="display: none"  id="deposit_{{wallet.currencyId}}" ng-form="cellForm">
                                <div ng-class="{'btcdeposit': wallet.code == 'BTC'}" class="sendBlockIn col-md-12 padding0 form-group">
                                    <form action="#" id="trans_{{wallet.ref_id}}">
                                        <div  class="col-md-5 col-md-offset-3 padding-right0" id="deposit_view_{{wallet.currency_id}}">
                                            <div id="btc_address" ng-show="wallet.code == 'BTC'">
                                                <div class="col-md-7 padding-left0">
                                                    <p class="inTitle">Direct BTC Deposit</p>
                                                    <div class="row">
                                                        <div class="col-md-6 QRBlock"> 
                                                            <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{qrcode}}" class="img-responsive">
                                                            <span>{{qrcode}}</span>
                                                        </div>
                                                        <div class="col-md-6 padding0 QRbtns">
                                                            <a href="javascript:void(0)" ng-click="getAddress()" class="btn btn-block brdrBtns">Generate Address</a>
                                                            <a href="javascript:void(0)" ng-click="copyAddress()"class="btn btn-block padding-left0 brdrBtns margin-top-10">Copy Address</a>
                                                        </div>
                                                    </div>
                                                    <div class="btcContent">
                                                        <ul>
                                                            <li>We do not have fee on direct BTC deposits.</li>
                                                            <li>Minimal amount for deposit is 0.01 BTC.</li>
                                                            <li>Your deposit will be credited automatically after 3 confirmations on the Bitcoin network.</li>
                                                            <li>Transaction confirmation can take from few minutes and up to 3 days depending on Bitcoin network speed </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btcRight" ng-show="wallet.code != 'BTC'">
                                                <p class="inTitle">Deposit Using Bank Details</p>
                                                <div class="msgInfo successNew top10"  style="display:none">
                                                    <p class="msgOnly" id="deposit_success_{{wallet.currency_id}}"></p>
                                                    <a onclick="successCloseNew()" href="javascript:void(0)">X</a>
                                                </div>
                                                <div class="msgInfo errorNew top10"  style="display:none">
                                                    <p class="msgOnly deposit_transaction_pass" id="deposit_error_{{wallet.currency_id}}"></p>
                                                    <a onclick="errorCloseNew()" href="javascript:void(0)">X</a>
                                                </div>
                                                <div class="col-md-12 padding0">
                                                    <div class="selectDrop">
                                                        <ui-select ng-change="readCurrencyData(wallet.currency_id);"  ng-model="adminBank.selected" theme="select2" ng-disabled="disabled">
                                                            <ui-select-match placeholder="Select E-Currency">{{$select.selected.title}} </ui-select-match>
                                                            <ui-select-choices repeat="adminBank in adminBankList">
                                                                <div ng-bind-html="adminBank.title + ' ' + adminBank.account_number  | highlight: $select.search" style="display: inline"></div>
                                                                <div ng-bind-html="adminBank.title + ' ' + adminBank.account_number" style="display: none;"></div>
                                                                <div ng-bind-html="adminBank.id" style="display: none;"></div>
                                                            </ui-select-choices>
                                                        </ui-select> 
                                                    </div>
                                                    <div class="col-md-12 padding0">
                                                        <span class="input input--hoshi">
                                                            <input  class="inputClass input__field input__field--hoshi" maxlength="8" type="text" name="amount" id="input_amount_{{wallet.currency_id}}" ng-model="wallet[$index].amount"  ng-change="filterFloatData(wallet[$index].amount, 'input_amount_', wallet.currency_id)"/>
                                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                                <span class="input__label-content input__label-content--hoshi">Amount</span>
                                                            </label>
                                                            <div class="currencyType">{{wallet.code}}</div>
                                                        </span>    
                                                        <span class="FeeDetails" id="deposit_fee_{{wallet.currency_id}}"></span>
                                                        <span class="FeeDetails" id="deposit_amount_{{wallet.currency_id}}"></span>
                                                    </div>
                                                    <div ng-if="istransactionEnabled == 1" class="col-md-12 padding0" id="transaction_password_div_{{wallet.currency_id}}">
                                                        <span class="input input--hoshi">
                                                            <input type="password" maxlength="15" class="inputClass input__field input__field--hoshi" name="transaction_password_deposit" id="transaction_password_deposit_{{wallet.currency_id}}"  ng-model="wallet[$index].transaction_password_deposit" ng-change="verifyTransactionPassword(wallet.currency_id, wallet[$index].transaction_password_deposit, 'deposit_error_')" />
                                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                                <span class="input__label-content input__label-content--hoshi">Transaction Password</span>
                                                            </label>
                                                        </span>    
                                                    </div>
                                                    <div style="display: none;" id="payment_rference_number_{{wallet.currency_id}}">
                                                        <div class="col-md-12 padding0">
                                                            <span class="input input--hoshi">
                                                                <input type="text" class="inputClass input__field input__field--hoshi" maxlength="20" name="reference" ng-model="wallet[$index].reference" />
                                                                <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                                    <span class="input__label-content input__label-content--hoshi">Payment Reference</span>
                                                                </label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="display_description_{{wallet.currency_id}}" value="1"/>
                                                    <div class="col-md-12 padding0">
                                                        <input class="btn btn-block greenBtn sendRequest" id="deposit_button_{{wallet.currency_id}}" type="submit" ng-click="letsDeposit(wallet[$index], wallet.currency_id)" value="View Details" />
                                                        <input class="btn btn-block greenBtn sendRequest" style="display: none;" id="deposit_update_{{wallet.currency_id}}" type="submit" ng-click="letsDepositRefUpdate(wallet[$index], wallet.currency_id)" value="Add Reference" />
                                                        <input type="hidden" id="deposit_ref_{{wallet.currency_id}}" value=""/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-md-offset-3 padding-right0" id="deposit_qrcode_{{wallet.currency_id}}" style="display:none;">
                                            <!-- checkout view code start-->
                                            <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=bitcoin:{{checkoutQrcode}}?amount={{transactionAmount}}" class="img-responsive"/>
                                            {{checkoutQrcode}} 
                                            Amount: {{transactionAmount}} BTC
                                            <div><img src="/images/ajax-loader_new.gif" style="max-width: 25%; margin-top: -171px; margin-left: 179px;"></div>
                                            <input type="hidden" id="reading_response_{{wallet.currency_id}}" value="1"/>
                                        </div>
                                        <div class="col-md-4 padding-right0 currencyDetails" ng-show="{{wallet.currency_id}}">
                                            <div id="currency_description_{{wallet.currency_id}}" class="currencyDetailsIn"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="depositfund" style="display:none;" id="redeem_{{wallet.currencyId}}" ng-form="tvoucher">
                                <div class="sendBlockIn col-md-12 padding0 form-group">
                                    <div class="col-md-5 col-md-offset-3 padding-right0">
                                        <p class="inTitle">Redeem Voucher</p>
                                        <div class="msgInfo successNew top10"  style="display:none">
                                            <p class="msgOnly" id="tvoucher_success_{{wallet.currency_id}}"></p>
                                            <a onclick="successCloseNew()" href="javascript:void(0)">X</a>
                                        </div>
                                        <div class="msgInfo errorNew top10"  style="display:none">
                                            <p class="msgOnly" id="tvoucher_error_{{wallet.currency_id}}"></p>
                                            <a onclick="errorCloseNew()" href="javascript:void(0)">X</a>
                                        </div>
                                        <div class="col-md-12 padding0">
                                            <span class="input input--hoshi">
                                                <input class="inputClass input__field input__field--hoshi" maxlength="70" type="text" name="tvouchercode" ng-model="tvoucher[$index].tvouchercode" ng-change="getAmount(tvoucher[$index].tvouchercode, wallet.currency_id);" onkeypress="return isSpace(event)" />
                                                <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                    <span class="input__label-content input__label-content--hoshi">T-Voucher Code</span>
                                                </label>
                                            </span>
                                            <span class="address FeeDetails" id="tvocuher_{{wallet.currency_id}}"></span>
                                        </div>
                                        <div ng-if="istransactionEnabled == 1" class="col-md-12 padding0" id="transaction_password_div_{{wallet.currency_id}}">
                                            <span class="input input--hoshi">
                                                <input type="password" maxlength="15" class="inputClass input__field input__field--hoshi" name="transaction_password_tvoucher" id="transaction_password_tvoucher_{{wallet.currency_id}}"  ng-model="tvoucher[$index].transaction_password_tvoucher" ng-change="verifyTransactionPassword(wallet.currency_id, tvoucher[$index].transaction_password_tvoucher, 'tvoucher_error_')" />
                                                <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                                                    <span class="input__label-content input__label-content--hoshi">Transaction Password</span>
                                                </label>
                                            </span>    
                                        </div>
                                        <div class="col-md-12 padding0">
                                            <input class="btn btn-block greenBtn sendRequest" id="tvoucher_button_{{wallet.currency_id}}" type="submit" ng-click="redeemVoucher(tvoucher[$index], wallet.currency_id)" value="Redeem" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="openDepositListTop clearfix">
            <h3 class="pageTitle">Open Deposit History</h3>
        </div>
        <div class="dataTableData table-responsive clearfix">
            <table id="testingdeposit" class="testingdeposit  table table-striped no-footer" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Transaction Ref</th>
                        <th>Payment Ref</th>
                        <th>Currency</th>
                        <th>Amount</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
            </table>
            <script>
                $(document).ready(function () {
                    loadDepositOpenRequest();
                });
                function loadDepositOpenRequest() {
                    oTable = $('#testingdeposit').DataTable({
                        "bDestroy": true,
                        "responsive": true,
                        "iDisplayLength": 50,
                        "aLengthMenu": [[50, 100, 150, -1], [50, 100, 150, "All"]],
                        "processing": true,
                        "serverSide": true,
                        "paging": true,
                        "order": [[0, "desc"]],
                        "ordering": false,
                        "pagingType": "full_numbers",
                        "ajax": {
                            "url": "/deposit/openlist",
                            "type": "POST"
                        },
                        "columns": [
                            {"data": "transaction_ref_id"},
                            {"data": "payment_response_id",
                                render: function (data, type, row) {
                                    if (data != '' && data != null) {
                                        return '<div class="orderId"><a href="javascript:void(0)">' + data + '</a></div>';
                                    } else {
                                        return '<a onclick="readReferenceFrm(' + row.transaction_ref_id + ')" class="adminIcon" href="javascript:void(0)">Add Reference</a>';
                                    }
                                }
                            },
                            {"data": "name"},
                            {"data": "amount"},
                            {"data": "created_at"},
                        ],
                    });
                }
                ;
            </script>
        </div>
    </div>
    <div id="refModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="exchangeModal customModal">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×  </button>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="modalHeader" colspan="3" id="myModalLabel">Add Reference Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" id="succssMsg" class="successMsg text-center">&nbsp;</td>
                                </tr>
                                <tr id="refFrm">
                                    <td>Reference Number</td>
                                    <td id="amount" class="userComment"> 
                                        <textarea name="paymentRef" id="paymentRef" placeholder="Enter Reference Number"></textarea>
                                    </td>
                                    <td id="amount"> <input type="submit" class="btn greenBtn" value="Add" onclick="addRef()"> </td>
                            <input type="hidden" id="transactionRef" value="">
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

