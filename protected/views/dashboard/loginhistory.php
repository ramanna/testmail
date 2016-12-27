<div class="clearfix mainContentIn">  
    <div class="loginHistoryTop clearfix">
        <h3 class="pageTitle">Login History</h3>
        <div class ="error" id="date_error"></div>
        <form method="post" action="" >
            <div class="advanceSearch searchBar" style="display: block !important">
                <div class="col-md-8 padding0 searchBarIn">
                    <div class=" col-md-6 padding0">
                        <label class="col-md-2 padding0 labelTxt" for="email">From</label>
                        <div class="col-md-10 datePickerCustom">
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
                        <div class="col-md-10 datePickerCustom">
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
                <div class="col-md-4 padding0 text-right">
                    <input type="button" class="btn greenBtn" value="Search" name="search" id="searchLoginHistory"/>
                </div>
            </div>
        </form>
    </div>
    <div class="dataTableData table-responsive clearfix">
        <table id="loginHistory" class="table table-striped" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Login Date</th>
                    <th>Country</th>
                    <th>IP Address</th>
                    <th>Browser</th>
                    <th>OS</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        var pathArray = window.location.hash.split('/');
        oTable = $('#loginHistory').DataTable({
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
                "url": "/user/loginhistory",
                "type": "POST"
            },
            "columns": [
                {"data": "last_login"},
                {
                    "data": "country",
                    render: function (data) {
                        return '<div class="orderId"><a href="javascript:void(0)">' + data + '</a></div>';
                    }
                },
                {"data": "ip_address"},
                {"data": "browser"},
                {"data": "operating_system"},
                {"data": "status",
                    render: function (data) {
                        switch (data) {
                            case 'SUCCESS' :
                                return '<div class="statusIcons"><a href="javascript:void(0)"><i class="fa fa-check" aria-hidden="true"></i></a></div>';
                                break;
                            case 'FAILED' :
                                return '<div class="statusIcons"><a href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a></div>';
                                break;
                            default  :
                                return 'N/A';
                        }
                    }

                },
            ],
        });

    });

    $("#searchLoginHistory").click(function () {
        $("#date_error").html("");
        if ($("#dateFrom").val() > $("#dateTo").val()) {
            $("#date_error").html("To Date should be greater then From Date!!!");
            return false;
        }
        oTable.columns(1).search($("#dateTo").val().trim(), $("#dateFrom").val().trim());
        oTable.draw();
    });
</script>