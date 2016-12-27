<div class="clearfix mainContentIn">  
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
    <div class="loginHistoryTop clearfix">
        <h3 class="pageTitle">Exchange History</h3>
        <div class ="error" id="date_error"></div>
        <form method="post" action="" >
            <div class="advanceSearch searchBar" style="display: block !important">
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
                    <!--<a class="btn greenBtn" href="javascript:void(0)">Search</a>-->
                </div>
            </div>
        </form>
    </div>

    <div class="dataTableData table-responsive clearfix">
        <table id="exchangeList" class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Date/Time</th>
                    <th>Order Ref</th>
                    <th>From Exchange Info</th>
                    <th>To Exchange Info</th>
                    <th>Comment</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        var pathArray = window.location.hash.split('/');
        oTable = $('#exchangeList').DataTable({
            "responsive": true,
            "iDisplayLength": 50,
            "aLengthMenu": [[50, 100, 150, -1], [50, 100, 150, "All"]],
            "processing": true,
            "serverSide": true,
            "paging": true,
            "order": [[0, "desc"]],
            "pagingType": "full_numbers",
            "ajax": {
                "url": "/exchange/history",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "orderid"
                },
                {
                    "data": "order_date",
                    render: function (data) {
                        return '<div class="dateTime">' + data + '</span>';
                    }
                },
                {
                    "data": "order_ref",
                    render: function (data) {
                        return '<div class="orderId"><p class="walet-blue"><a onclick="readTransactionDetails(' + data + ')" href="javascript:void(0);"> #' + data + '</a></p> </div>';
                    }
                },
                {
                    "data": "fwdImage",
                    render: function (data, type, row) {
                        var fwdAmtF = parseFloat(row.fwdAmt).toFixed(2);
                        if (row.fwdcurCode == 'BTC') {
                            fwdAmtF = parseFloat(row.fwdAmt).toFixed(8);
                        }
                        return "<img src= '/currency_logo/" + data + "'>" + " " + fwdAmtF + " " + row.fwdcurCode;
                    }
                },
                {
                    "data": "fwdImage",
                    render: function (data, type, row) {
                        var fwdAmtF = parseFloat(row.fwdAmt).toFixed(2);
                        if (row.fwdcurCode == 'BTC') {
                            fwdAmtF = parseFloat(row.fwdAmt).toFixed(8);
                        }
                        return   "<img src= '/currency_logo/" + row.bkdImage + "'>" + " " + row.bkdAmt + " " + row.bkdCode;
                    }
                },
                {
                    "data": "admin_comment",
                    render: function (data, type, row) {
                        if ((data === undefined || data === null) && (row.user_comment === undefined || row.user_comment == "")) { 
                            return '<div class="text-center "><a onclick="readComment(' + row.order_ref + ')" class="adminIcon" href="javascript:void(0)"><i class="fa fa-commenting-o" aria-hidden="true" ></i></a> </div>';
                        } else {
                            var commentCheck = data ? data.trim() : (row.user_comment).trim() ;
                            return '<div class="text-center active "><a onclick="readComment(' + row.order_ref + ')" class="adminIcon" href="javascript:void(0)"><i class="fa fa-commenting-o" aria-hidden="true" title="' + commentCheck + '"></i></a> </div>';
                        }

                    }
                },
                {"data": "status",
                    render: function (data) {
                        switch (data) {
                            case 'COMPLETED' :
                                return '<div class="statusIcons"><a href="javascript:void(0)"><i class="fa fa-check-square-o" aria-hidden="true" title="' + data + '"></i></a></div>';
                                break;
                            case 'AWAITING ADMIN ACTION' :
                            case 'AWAITING USER ACTION' :
                            case 'PENDING' :
                            case 'PENDING CONFIRMATION' :
                                return '<div class="statusIcons"><a href="javascript:void(0)"><i class="fa fa-clock-o" aria-hidden="true" title="' + data + '"></i></a></div>';
                                break;
                            case 'CANCELLED' :
                                return '<div class="statusIcons"><a href="javascript:void(0)"><i class="fa fa-ban" aria-hidden="true" title="' + data + '"></i></a></div>';
                                break;
                            default  :
                                return 'N/A';
                        }
                    }

                }

            ],
            "columnDefs": [
                {"visible": false, "targets": [0]}
            ]
        });

    });

    $("#searchAll").click(function () {
        $("#date_error").html("");
        if ($("#dateFrom").val() > $("#dateTo").val()) {
            $("#date_error").html("To Date should be greater then From Date!!!");
            return false;
        }
        oTable.columns(1).search($("#dateTo").val().trim(), $("#dateFrom").val().trim());
        oTable.draw();
    });


    function readComment(id) {
        //alert(id);
        $.ajax({
            type: "post",
            url: "/exchange/readcomment",
            data: {'orderRef': id},
            success: function (responseData) {
                var responseData = jQuery.parseJSON(responseData);
                $("#adminCommentInfo").hide();
                $("#userCommentInfo").hide();
                if ((responseData.admin_comment) != null && ((responseData.admin_comment).length > 5)) {
                    $("#adminCommentInfo").show();
                }
                if (responseData.user_comment != null && ((responseData.user_comment).length > 5)) {
                    $("#userCommentInfo").show();
                }
                $("#adminComment").html(responseData.admin_comment);
                $("#userComment").html(responseData.user_comment);
                $("#orderRef").val(id);
                $("#commentModal").modal("show");
            }
        });

    }

    function userCommnetData() {
        if ($("#user_comment").val()) {
            $.ajax({
                type: "post",
                url: "/exchange/updatecomment",
                data: {'orderRef': $("#orderRef").val(), 'comment': $("#user_comment").val()},
                success: function (responseData) {
                    setTimeout(function () {
                        window.location.reload(1);
                    }, 3000);
                    $("#succssMsg").html("Your comment has been added");
                    $("#user_comment").val("");
                    $("#userCommnetFrm").hide();
                }
            });
        }
    }
    
    function readTransactionDetails(id) {
        $.ajax({
            type: "post",
            url: "/wallet/orderdetails",
            data: {'orderRef': id , 'exchange': 'yes'},
            success: function (responseData) {
//                console.log(responseData);
                var responseData = jQuery.parseJSON(responseData);
                $("#orderRefEx").html(responseData.orderRef);
                $("#type").html(responseData.type);
                
                var altCurrencyCode = responseData.altCurrencyCode ;
                if(responseData.altCurrencyCode == ""){
                    altCurrencyCode = (responseData.txnCurrencyName).substring(0, 3);
                }
                
                var txnCurrencyCode = responseData.txnCurrencyCode ;
                if(responseData.txnCurrencyCode == ""){  
                    txnCurrencyCode = (responseData.altCurrencyName).substring(0, 3);
                }
                
                $("#fcurrency").html(responseData.txnCurrencyName + " ("+ txnCurrencyCode + ")");
                $("#tcurrency").html(responseData.altCurrencyName + " ("+ altCurrencyCode + ")");  
                
                /* In case : User are transferring amount  */
                $("#receiveAmt").html(responseData.receiveAmt +" " + altCurrencyCode);
                
                $("#youSent").html(responseData.totalAmt +" "+ responseData.txnCurrencyCode);
               
                $("#feeInfo").hide();
//                if(responseData.fee > 0 ){
//                    $("#feeInfo").show();
//                    $("#fee").html(responseData.fee +" "+ responseData.altCurrencyCode);
//                }
               
                $("#adminCommentEx").html(responseData.admin_comment);
                if((responseData.admin_comment) == null ){ 
                    $("#adminCommentInfoEx").hide();
                }
                $("#userCommentEx").html(responseData.user_comment);
                if((responseData.user_comment) == null || (responseData.user_comment) == "" ){
                    $("#UserCommentInfo").hide();
                }
                
                $("#orderDate").html(responseData.created_at);
                $("#status").html(responseData.status);
                $("#exchangeDetails").modal("show");
            }
        });

    }

</script>

<div id="commentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="exchangeModal customModal">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×  </button>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="modalHeader" colspan="3" id="myModalLabel">Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="adminCommentInfo" class="defaultNone">
                                <td style="border-bottom: 0">Admin Comment</td>
                                <td colspan="2" id="adminComment"></td>
                            </tr>

                            <tr  id="userCommentInfo" class="defaultNone">
                                <td style="border-bottom: 0">User Comment</td>
                                <td colspan="2" id="userComment"></td>
                            </tr>
                            <tr>
                                <td colspan="3" id="succssMsg" class="successMsg text-center">&nbsp;</td>
                            </tr>
                            <tr id="userCommnetFrm">
                                <td>User Comment</td>
                                <td id="amount" class="userComment"> 
                                    <textarea name="user_comment" id="user_comment" placeholder="Enter your comment"></textarea>
                                </td>
                                <td id="amount"> <input type="submit" class="btn greenBtn" value="comment" onclick="userCommnetData()"> </td>
                        <input type="hidden" id="orderRef" value="">
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="exchangeDetails" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <td>order Ref</td>
                                <td id="orderRefEx"></td>
                            </tr>
                            <tr>
                                <td>From Currency</td>
                                <td id="fcurrency"></td>
                            </tr>
                            <tr>
                                <td>To Currecny</td>
                                <td id="tcurrency"></td>
                            </tr>
                            
                            <tr id="feeInfo" class="defaultNone">
                                <td>Fee</td>
                                <td id="fee"></td>
                            </tr>
                            
                            <tr id="youSentInfo" class="defaultNone">
                                <td>You Sent</td>
                                <td id="youSent"></td>
                            </tr>
                            
                            <tr>
                                <td id="receiveLabel">You Receive</td>
                                <td id="receiveAmt"></td>
                            </tr>
                            
                            <tr id="adminCommentInfoEx" class="defaultNone">
                                <td>Admin Comment</td>
                                <td id="adminCommentEx"></td>
                            </tr>
                            <tr id="UserCommentInfo" class="defaultNone">
                                <td>User Comment</td>
                                <td id="userCommentEx"></td>
                            </tr>
                            <tr>
                                <td>Order Date</td>
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
</div>

