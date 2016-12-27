 
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
            <div class="col-sm-3">
                <?php include("sidemenu.php"); ?>
            </div>
            <div>
                <div class="col-sm-9"  ng-controller="mailController">
                    <section class="panel">
                        <header class="panel-heading wht-bg">
                            <h4 class="gen-case">Inbox
                            </h4>
                        </header>
                        <div class="panel-body minimal">
                            <table id="inbox" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Subject</th>
                                        <th>Date & Time</th>
                                        <th>Attachment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                            <script>
                                        var sTable = $('#inbox').DataTable({
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
                                                "url": "/mail/getmail",
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
                                                {"data": "title"},
                                                {"data": "updated_at"},
                                                {
                                                    "data": "attachment",
                                                    "searchable": false,
                                                    "orderable": false,
                                                    render: function (data, type, row, meta) {
                                                        if(data){
                                                            return '<i class="fa fa-paperclip" aria-hidden="true"></i>';
                                                        }else{
                                                            return "";
                                                        }
                                                    }
                                                },
                                                {
                                                    "data": "mailid",
                                                    "searchable": false,
                                                    "orderable": false,
                                                    render: function (data, type, row) {
                                                        return '<div class="mailIcons"><a title="Reply" href="compose?id=' + data + '" ><i class="fa fa-reply" aria-hidden="true"></i></a></div>';
                                                    },
                                                    className: "dt-body-center"
                                                }
                                            ]
                                        });
                            </script>
                        </div>
                </div>
                </section>
            </div>
        </div>
    </section>
</div>
</div>
<!--List of Mail content Started-->
</div>
</section><!-- --/wrapper ---->
</section><!-- /MAIN CONTENT -->