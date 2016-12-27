<div class="mainContentIn preferencePage"> 
    <div class="customTabbed">
        <a  href="#/settings">MY PROFILE</a>
        <a href="#/security">SECURITY</a>
        <a ng-click="getVerificationDetails()" href="#/verification">VERIFICATION</a>
        <a class="active" ng-click="getBankDetails()" href="#/bankaccounts">BANK ACCOUNTS</a>
    </div>

    <div class="TabbedContent tab-content twoColumns clearfix">
        <div class="bankDetails form-group"  style="height:50px">
            <div class="creatAccount clearfix">
                <div class="col-md-6 col-xs-6 text-left">
                    <a class="greenBtnaa" onclick="displayFrm()">+ BANK ACCOUNT</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="msgInfo successNew top10"  style="display:none">
        <p class="msgOnly" id="addbank_success_1"></p>
        <a onclick="successCloseNew()" href="javascript:void(0)">X</a>
    </div>
    <div class="msgInfo errorNew top10"  style="display:none">
        <p class="msgOnly" id="addbank_error_1"></p>
        <a onclick="errorCloseNew()" href="javascript:void(0)">X</a>
    </div>

    <div class="clearfix addBankFrm" style="display: none;">
        <div class="TabbedContent tab-content twoColumns clearfix">
            <div class="bankDetails form-group">
                <div class="col-md-6">
                    <span class="input input--hoshi">
                        <input maxlength="20" ng-model="binfo.accountTitle" name="accountTitle" id="accounttitle" class="input__field input__field--hoshi" type="text"/>
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
                        <input maxlength="16" type="text" class="inputClass input__field input__field--hoshi" id="accountNumber " name="accountNumber" ng-model="binfo.accountNumber" ng-change="checkingAccountNumber(binfo.accountNumber, 'addbank_error_', 1)" onkeypress="return isNumber(event)" />
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
                        <input maxlength="20" ng-model="binfo.accountName" name="accountName" id="accountName_1" class="input__field input__field--hoshi" type="text" />
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
                        <input type="text" maxlength="15" class="inputClass input__field input__field--hoshi " id="ifsc_1" name="ifsc" ng-model="binfo.ifsc" ng-change="checkIfsc(binfo.ifsc, 'bankaccount_error_', 1)" onkeypress="return isSpace(event)"/>
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
                        <input ng-model="binfo.bankName" name="bankName" class="input__field input__field--hoshi ifscinfo" id="bankName_1" type="text"  readonly=""/>
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
                        <input ng-model="binfo.branchName" name="branchName" class="input__field input__field--hoshi ifscinfo" type="text" id="branchName_1" type="text" readonly=""/>
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
                        <textarea ng-model="binfo.branchAddress" name="bankAddress" class="input__field input__field--hoshi ifscinfo" id="bankAddess_1" readonly=""></textarea>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1">
                            <span class="input__label-content input__label-content--hoshi">Address</span>
                        </label>
                        <span class="infoIcon">
                            <i tooltip-placement="left" uib-tooltip="Bank Address." class="glyphicon glyphicon-info-sign"></i>
                        </span>
                    </span>
                </div>
                <div class="col-md-6">
                    <a class="showwitdraw"><< Back to </a>
                </div>
                <div class="col-md-6">
                    <input type="hidden" id="is_accnumber_valid_1" value="1">
                    <input type="hidden" id="is_ifsc_valid_1" value="1">
                    <input class="btn btn-default btn-block btn-submit sendRequest" type="submit" ng-click="addBankInfo(binfo, 'addbank_error_', 1)" value="Save Bank Details" />
                </div>
            </div>
        </div>
    </div>

    <div class="ContentSection">
        <span id="successBank"></span>
        <span id="errorBank"></span>
        <div class="exchangeMain">

            <div class="dataTableData table-responsive clearfix">
                <table id="depositList" class="table table-striped no-footer" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>IFSC Code</th>
                            <th>Account Name</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
                <script>
                    $(document).ready(function () {
                        loadDepositOpenRequest();
                    });
                    function loadDepositOpenRequest() {
                        oTable = $('#depositList').DataTable({
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
                                "url": "/user/banklist",
                                "type": "POST"
                            },
                            "columns": [
                                {"data": "title"},
                                {"data": "code"},
                                {"data": "account_name"},
                                {"data": "bank_name"},
                                {"data": "account_number"},
                                {"data": "address"},
                                {
                                    "data": "id",
                                    "searchable": false,
                                    "orderable": false,
                                    render: function (data) {
                                        return '<div class="mailIcons"><a title="Remove" onclick="changeStatus(' + data + ')" ><i class="fa fa-times" aria-hidden="true"></i></a></div>';
                                    },
                                    className: "dt-body-center"
                                }
                            ],
                        });
                    }
                    
                    function changeStatus(data){
                    var succeed = false;
                    if (confirm("Are you sure you want to delete?")) {
                        $.ajax({
                            type: "POST",
                            url: "/preferences/changestatus",
                            async: false,
                            data: {id: data},
                            success: function (data) {
                                console.log(data); return false;
//                                bankTable.draw();
//                                if (msg == 1) {
//                                    $(".successNew").show();
//                                    $("#successBank").html("<div class='successNew top10 msgInfo'><p class='msgOnly'>Bank Removed successfully.</p><a onclick='onClickClose()' href='javascript:void(0)'>X</a></div>");
//                                } else {
//                                    $(".errorNew").show();
//                                    $("#errorBank").html("<div class='errorNew top10 msgInfo'><p class='msgOnly'>Bank not Removed.</p><a onclick='onClickClose()' href='javascript:void(0)'>X</a></div>");
//                                }
                            }
                        });
                        return succeed;
                    } else {
                        return succeed;
                    }
                }
                </script>
            </div>
        </div>
        <script>
            function displayFrm(){
                $('.addBankFrm').show();                
            }
        </script>