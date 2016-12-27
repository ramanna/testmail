<div class="clearfix mainContentIn">  
  <div class="loginHistoryTop clearfix">
	<h3 class="pageTitle">Voucher History</h3>
	<div class ="error" id="date_error"></div>
	<form method="post" action="" >
	  <div class="advanceSearch searchBar" style="display: block !important">
		<div class="col-md-6 padding0 searchBarIn">
		  <div class=" col-md-6 padding0">
			<label class="col-md-2 padding0" for="email">From</label>
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
		<div class="col-md-6 padding0 text-left">
		  <input type="button" class="btn greenBtn" value="Search" name="search" id="searchVoucherHistory"/>
		</div>
	  </div>
	</form>
  </div>
  <div class="dataTableData table-responsive clearfix">
	<table id="voucherHistory" class="table table-striped" cellspacing="0" width="100%">
	  <thead>
		<tr>
		  <th>Wallet</th>
		  <th>Voucher Code</th>
		  <th>Amount</th>
		  <th>Used By</th>
		  <th>Created Date</th>
		  <th>Used Status</th>
		</tr>
	  </thead>
	</table>
  </div>
</div>
<script>
  $(document).ready(function () {
    var pathArray = window.location.hash.split('/');
    oTable = $('#voucherHistory').DataTable({
      "bDestroy": true,  
      "responsive": true,
      "iDisplayLength": 50,
      "aLengthMenu": [[50, 100, 150, -1], [50, 100, 150, "All"]],
      "processing": true,
      "serverSide": true,
      "paging": true,
      "order": [[4, "desc"]],
      "ordering": false,
      "pagingType": "full_numbers",
      "ajax": {
        "url": "/voucher/history",
        "type": "POST"
      },
      "columns": [
        {"data": "currencyName"},
        {"data": "code"},
        {"data": "amount"},
        {"data": "uName"},
        {"data": "created_at"},
        {"data": "is_used"}
      ],
    });
  });
  $("#searchVoucherHistory").click(function () {
    $("#date_error").html("");
    if ($("#dateFrom").val() > $("#dateTo").val()) {
      $("#date_error").html("To Date should be greater then From Date!!!");
      return false;
    }
    oTable.columns(1).search($("#dateTo").val().trim(), $("#dateFrom").val().trim());
    oTable.draw();
  });
</script>