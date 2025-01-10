<!-- views/reports/failed_login_attempts_report.php -->
<?php include "header.php"; ?>

<body data-layout="horizontal" class="full-vh-overflow-hide" data-topbar="dark">
    <style>
        
.red-line {
    border-top: 1px solid red;
    margin: 10px 0;
}

    </style>

    <div id="layout-wrapper">
        <?php echo $top_nav; ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Failed Login Attempts Report</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Failed Login Attempts Report</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <!-- Date Range Filter -->
                                        <div class="row justify-content-center">
    <div class="col-md-2 text-center">
        <input type="date" id="fromDate" class="form-control" placeholder="From Date">
    </div>
    <div class="col-md-2 text-center">
        <input type="date" id="toDate" class="form-control" placeholder="To Date">
    </div>
</div>

                                    </div>
                                
                                    <table id="dataTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Phone</th>
                                                <th>Name</th>
                                                <th>Login Attempt</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($failed_login_attempts as $attempt): ?>
                                                <tr>
                                                    <td><?php echo $attempt->id; ?></td>
                                                    <td><?php echo $attempt->phone; ?></td>
                                                    <td><?php echo $attempt->name; ?></td>
                                                    <td><?php echo $attempt->login_attempt; ?></td>
                                                    <?php 
                
                                                    $attempt_date = date('Y-m-d', strtotime($attempt->attempt_time));
                                                    $attempt_time = date('H:i:s', strtotime($attempt->attempt_time));
                                                      ?>
                                                     <td><?php echo $attempt_date; ?></td>
                                                     <td><?php echo $attempt_time; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include ('footer.php'); ?>

    <!-- Include DataTables CSS and JavaScript -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function(){
            // Initialize DataTable
            $('#dataTable').DataTable();

            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dataTable tbody tr").filter(function() {
                    $(this).toggle(
                        $(this).text().toLowerCase().indexOf(value) > -1 ||
                        $(this).find('td:nth-child(5)').text().toLowerCase().indexOf(value) > -1 ||
                        $(this).find('td:nth-child(6)').text().toLowerCase().indexOf(value) > -1
                    );
                });
            });

            // Date Range Filter
            $("#fromDate, #toDate").on("change", function() {
                var fromDate = $("#fromDate").val();
                var toDate = $("#toDate").val();

                $("#dataTable tbody tr").each(function() {
                    var date = $(this).find('td:nth-child(5)').text();

                    if(date >= fromDate && date <= toDate) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });






        });
    </script>
</body>
</html>
