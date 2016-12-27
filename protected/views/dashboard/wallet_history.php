<div class="col-md-10">
    <?php
    if (isset(Yii::app()->session['paymentSuccess']) && !empty(Yii::app()->session['paymentSuccess'])) {
        echo '<div class="msgInfo successNew top10"><p class="msgOnly">' . Yii::app()->session['paymentSuccess'] . '</p><a onclick="successCloseNew()" href="javascript:void(0)">X</a></div>';
        Yii::app()->session['paymentSuccess'] = "";
    }
    if (isset(Yii::app()->session['paymentError']) && !empty(Yii::app()->session['paymentError'])) {
        echo '<div class="msgInfo errorNew top10"><p class="msgOnly">' . Yii::app()->session['paymentError'] . '</p><a onclick="errorCloseNew()" href="javascript:void(0)">X</a></div>';
        Yii::app()->session['paymentError'] = " ";
    }
    ?>
</div>
<div class="mainContentIn walletHistory">
    <div class="TabbedMenu clearfix">
        <div class="customTabbed">
            <a  class="active" href="/dashboard#/wallethistory">All</a>
            <a ng-repeat="wallet in walletList" index="[wallet.currencyId]" heading="{{wallet.name}}" ng-if="wallet.ref_id" href="/dashboard#/{{ wallet.code | lowercase }}wallet">{{ wallet.name}}</a>
        </div>
        <ng-form name="nestedForm">
            <div class="ContentSection">
                <div class="padding0 composeContent">
                    <div class="padding0 searchBar">
                        <p>Transaction History</p>
                        <div class="col-md-2 form-group pull-right text-right advanceClick padding-left0">
                            <a href="javascript:void(0)" ng-click="ShowHide()">Advance Search <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
                        </div>

                    </div>
                </div>
            </div>
        </ng-form>
    </div>
    <form id="profitability_filter_frm" class="col-md-12"  method="post" action="" >
        <div class ="error" id="date_error_all"></div>
        <div class="advanceSearch searchBar">
            <div class="col-md-8 searchBarIn">
                <div class=" col-md-6 padding0">
                    <label class="col-md-2 padding0 labelTxt" for="email">From</label>
                    <div class="col-md-10">
                        <datepicker
                            date-format="yyyy-MM-dd"
                            date-min-limit=""
                            date-max-limit="{{currentDate.toString()}}"
                            button-prev='<i class="fa fa-arrow-circle-left"></i>'
                            button-next='<i class="fa fa-arrow-circle-right"></i>'>
                            <input ng-model="dateFrom" type="text" id="dateFrom" name="dateFrom" placeholder="From Date"/>
                        </datepicker>
                    </div>
                </div>
                <div class="padding0 col-md-6">
                    <label class="col-md-2 padding0 labelTxt" for="pwd">To</label>
                    <div class="col-md-10">
                        <datepicker
                            date-format="yyyy-MM-dd"
                            date-min-limit=""
                            date-max-limit="{{currentDate.toString()}}"
                            button-prev='<i class="fa fa-arrow-circle-left"></i>'
                            button-next='<i class="fa fa-arrow-circle-right"></i>'>
                            <input ng-model="dateTo" type="text" id="dateTo" name="dateTo" placeholder="To Date"/>
                        </datepicker>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <input type="button" class="btn greenBtn" value="Search" name="search" id="searchAll"/>
            </div>
        </div>
    </form>
    <!--<a ng-click="orderDetails()" href="javascript:void(0)">hello124</a>-->
    <div class="dataTableData table-responsive clearfix">
        <table id="wallethistoryAll" class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th class="wallet-Time">Time</th>
                    <th>Reference Id</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th class="text-right">Amount</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<input type="hidden" id="currentUserId" value="<?php echo Yii::app()->session['userId']; ?>">
<script>

    $(document).ready(function () {
        var currentUser = $('#currentUserId').val();
        var pathArray = window.location.hash.split('/');
        oTable = $('#wallethistoryAll').DataTable({
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
                "url": "/wallet/wallethistory?type=" + pathArray[1],
                "type": "POST"
            },
            "columns": [
                {
                    "data": "date",
                    render: function (data, type, row) {
                        return '<div class="col-md-1"> <div class="wallet-month"> <p class="month">' + row.month + '</p> <p class="date">' + data + '</p></div> </div>';
                    }
                },
                {
                    "data": "time",
                    render: function (data, type, row) {
                        return '<div class="padding-left0"> <div class="wallet-Time"> <p>' + data + '</p> </div> </div>';
                    }
                },
                
                {"data":"transaction_ref_id"},    
                    
                {"data": function (row) {
                        var title = row.type;
                        return '<img class="walletImg" title="' + title + '" src="/images/wallet/'+title.toLowerCase()+'.png">';
                    }
                },
                {
                    "data": "transactionNotes",
                    render: function (data, type, row) {
                        var userComment = row.user_comment;
                        if (row.user_comment == null) {
                            userComment = "";
                        }
                        return '<div class="col-md-12"><p class="walet-blue"><a onclick="readTransactionData(' + row.transaction_ref_id + ')" href="javascript:void(0);">' + data + '</a></p><p class="walet-dark">' + userComment + '</p>  </div>';
                    }
                },
                {
                    "data": "status",
                    "className": "status"
                },
                {
                    "data": "amount",
                    render: function (data, type, row) {
                        var amountType = "+";
                        var className = "blue";
                        if (currentUser == row.from_user_id) {
                            className = "red";
                            amountType = "-";
                        }
                        return '<div class="text-right"><p class="walet-' + className + '">' + amountType + data + ' ' + row.currencyName + '</p></div>';
                    }
                },
            ],
        });

    });

    $("#searchAll").click(function () {
        $("#date_error_all").html("");
        if ($("#dateFrom").val() > $("#dateTo").val()) {
            $("#date_error_all").html("To Date should be greater then From Date!!!");
            return false;
        }
        oTable.columns(1).search($("#dateTo").val().trim(), $("#dateFrom").val().trim());
        oTable.draw();
    });


</script>
<div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="exchangeModal customModal">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>X</span> </button>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="modalHeader" id="myModalLabel" colspan="2"><span id="type"></span> Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Reference Id</td>
                                <td id="transactionRef"></td>
                            </tr>
                            <tr>
                                <td>Currecny Name</td>
                                <td id="currencyName"></td>
                            </tr>

                            <tr id="toUserInfo" class="defaultNone">
                                <td>To Account</td>
                                <td id="toAccount"></td>
                            </tr>

                            <tr id="amountInfo" class="defaultNone">
                                <td>Amount</td>
                                <td id="amount"></td>
                            </tr>

                            <tr id="feeInfo" class="defaultNone">
                                <td>Fee</td>
                                <td id="fee"></td>
                            </tr>

                            <tr id="yourInfo">
                                <td id="sentLabel">You Sent</td>
                                <td id="voucherlLabel">Voucher Amount</td>
                                <td id="receiveLabel">You Receive</td>
                                <td id="receiveAmt"></td>
                            </tr>

                            <tr id="paymentRefInfo" class="defaultNone">
                                <td>Payment Reference</td>
                                <td id="paymentRefId"></td>

                            </tr>
                            <tr id="paymentRefIdInputValue">
                                <td></td>
                                <td>
                                    <input id="paymentRef" placeholder="Enter Reference Number" maxlength="25">
                                    <input type="submit" id="buttonLabel" class="btn greenBtn" value="Update" onclick="updateRef()">
                                </td>
                            <input type="hidden" id="transactionRef" value="">
                            </tr>

                            <tr id="receivedInfo" class="defaultNone">
                                <td>Received From</td>
                                <td id="received"></td>
                            </tr>

                            <tr id="tranferedToInfo" class="defaultNone">
                                <td>Transferred To</td>
                                <td id="tranferedTo"></td>
                            </tr>

                            <tr id="adminCommentInfo">
                                <td>Admin Comment</td>
                                <td id="adminComment"></td>
                            </tr>
                            <tr id="UserCommentInfo">
                                <td>User Comment</td>
                                <td id="userComment"></td>
                            </tr>

                            <tr>
                                <td>Transaction Date</td>
                                <td id="orderDate"></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td id="status"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>