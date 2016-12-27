<div class="mainContentIn supportPage">
  <div class="customTabbed">
	<a href="#/support"><i class="fa fa-pencil-square-o"></i>COMPOSE</a>
    <a ng-click="getInboxDetails()" href="#/inbox"><i class="fa fa-envelope-o"></i>INBOX</a>
    <a class="active" ng-click="getOutboxDetails()" href="#/outbox"><i class="fa fa-paper-plane-o"></i>SENT</a>
  </div>
    
    <div class="ContentSection">
        <table id = "outbox" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Subject</th>
                    <th>Receiver</th>
                    <th>Date & Time</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        <script>
            var sTable = $('#outbox').DataTable({
                "responsive": true,
                "iDisplayLength": 50,
                "aLengthMenu": [[50, 100, 150, -1], [50, 100, 150, "All"]],
                "processing": false,
                "serverSide": true,
                "paging": true,
                "bSort": true,
                "order": [[3, "desc"]],
                "pagingType": "full_numbers",
                "ajax": {
                    "url": "/support/getsentmail",
                    "type": "POST"
                },
                "columns": [
                    {
                        "data": "id",
                        "searchable": false,
                        "orderable": false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {"data": "subject"},
                    {"data": "name"},
                    {"data": "updated_at"},
                    {
                        "data": "id",
                        "searchable": false,
                        "orderable": false,
                        render: function (data, type, row) {
                            return '<div class="mailIcons"><a title="Reply" href="#/reply?id=' + data + '" ><img src="/images/icons/mail-sent.png"></a><a title="View" href="#/view?id=' + data + '" ><img src="/images/icons/mail-view.png"></a></div>';
                        },
                        className: "dt-body-center"
                    }
                ]
            });
        </script>
    </div>
</div>

