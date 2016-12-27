<div class="col-md-12">
  <span id="successOrder"></span>
  <span id="errorOrder"></span>
</div>
<div class="mainContentIn walletHistory">
  <form id="orderHistoryForm" class="col-md-12 top10"  method="post" action="" >
	<div class ="error" id="date_error_all"></div>
	<div class="innerTitle">
	  <h5>Advance Search</h5>
	</div>
	<div class="advanceSearch searchBar">
	  <div class="col-md-6 searchBarIn padding0">
		<div class=" col-md-5 padding0">
		  <label class="col-md-2 padding0 labelTxt" for="email">From</label>
		  <div class="col-md-10 padding0">
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
		<div class="padding0 col-md-5">
		  <label class="col-md-2 padding0 labelTxt" for="pwd">To</label>
		  <div class="col-md-10 padding0">
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
		<div class="col-md-2 padding0 text-right">
		  <input type="button" class="btn greenBtn" value="Search" name="search" id="searchAll"/>
		</div>
	  </div>
	  <div class="col-md-6 padding0">
		<div class="col-md-6">
		  <label  class="col-md-3 padding0">Status </label>
		  <div class="col-md-9 padding0">
			<select class="form-control" id="orderFilter" name="orderFilter" ng-model="selectedOrder" 
			  ng-options="status.orderName for status in orderFilter track by status.orderName"></select>
		  </div>
		</div>
		<div class="col-md-6">
		  <label  class="col-md-3">Type</label>
		  <div class="col-md-9">
			<select class="form-control" id="orderTypeFilter" name="orderTypeFilter" ng-model="selectedtype" 
			  ng-options="type.typeName for type in orderTypeFilter track by type.typeName">
			</select>
		  </div>
		</div>
	  </div>
	</div>
  </form>
  <div class="dataTableData table-responsive clearfix">
	<table id="orderHistory" class="table" cellspacing="0" width="100%">
	  <thead>
		<tr>
		  <th>Date</th>
		  <th>Pair</th>
		  <th>Type</th>
		  <th>Price</th>
		  <th>Amount</th>
		  <th>Total</th>
		  <th>Filled %</th>
		  <th>Status</th>
		  <th>Actions</th>
		</tr>
	  </thead>
	</table>
  </div>
</div>
<script>
  $(document).ready(function () {
    oTable = $('#orderHistory').DataTable({
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
        "url": "/trade/orderhistory",
        "type": "POST"
      },
      "columns": [
        {"data": "date"},
        {"data": "pair"},
        {"data": "type"},
        {"data": "price"},
        {"data": "amount"},
        {"data": "total"},
        {"data": "filledPercentage"},
        {"data": "status"},
        {
          "data": "id",
          "searchable": false,
          "orderable": false,
          render: function (data, type, row) {
            if (row.status == "ACTIVE" || row.status == "PARTIALLY FILLED") {
              return '<a title="Cancel" onclick="changeStatus(' + data + ')" ><i class="fa fa-ban" aria-hidden="true"></i></a>';
            } else {
              return '';
            }
          },
          className: "dt-body-center"
        }
      ],
    });

  });
  function changeStatus(id)
  {
    var succeed = false;
    $.ajax({
      type: "POST",
      url: "/trade/changestatus",
      async: false,
      data: {id: id},
      success: function (value) {
        oTable.draw();
        if (value == 1) {
          $(".successNew").show();
          $("#successOrder").html("<div class='successNew top10 msgInfo'><p class='msgOnly'>Cancelled Order Successfully.</p><a onclick='onClickClose()' href='javascript:void(0)'>X</a></div>");
        } else {
          $(".errorNew").show();
          $("#errorOrder").html("<div class='errorNew top10 msgInfo'><p class='msgOnly'>Failed to remove order.</p><a onclick='onClickClose()' href='javascript:void(0)'>X</a></div>");
        }
      }
    });
    return succeed;
  }
  function onClickClose() {
    $(".successNew").hide();
    $(".errorNew").hide();
  }
  $("#orderFilter").change(function () {
    oTable.columns(7).search($("#orderFilter").val().trim());
    oTable.draw();
  });
  $("#orderTypeFilter").change(function () {
    oTable.columns(2).search($("#orderTypeFilter").val().trim());
    oTable.draw();
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