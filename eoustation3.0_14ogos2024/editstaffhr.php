<?php
session_start();
include "db_conn.php";

$fname = $_SESSION['user_name'];

$id = $_SESSION['id'];

if (isset($_POST["update"])) {
    $_SESSION['updateid'] = $_POST['update'];

    header("Location:editStaffform .php");
    exit();
}
if (isset($_POST['Active'])) {  
    $uid = $_POST['uid'];
    $sql = "UPDATE hrm_user SET role = 0 WHERE id = '$uid'";
    mysqli_query($conn, $sql);

    if ($conn->query($sql)) {
        echo "<script>alert('Role successfully deactivated.')</script>";
    } else {
        echo "<script>alert('Role failed to deactivate. $conn -> $error')</script>";
    }
}

if (isset($_POST['Deactivate'])) {
    $uid = $_POST['uid'];
    $sql = "UPDATE hrm_user SET role = 1 WHERE id = '$uid'";
    mysqli_query($conn, $sql);

    if ($conn->query($sql)) {
        echo "<script>alert('Role successfully activated.')</script>";
    } else {
        echo "<script>alert('Role failed to activate. $conn -> $error')</script>";
    }
}

if (isset($_POST["delete"])) {
    $delete = $_POST['delete'];
    $sql = "DELETE FROM `empmaininfo` WHERE First_Name='$delete'";
    $result = mysqli_query($conn, $sql);

    if ($conn->query($sql)) {
        echo "<script>alert('Delete success.')</script>";
    } else {
        echo "<script>alert('Delete failed. $conn -> $error')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Outstation</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- jsGrid -->
    <link rel="stylesheet" href="plugins/jsgrid/jsgrid.min.css">
    <link rel="stylesheet" href="plugins/jsgrid/jsgrid-theme.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <!-- Main content -->
        <section class="content">
            
            <!-- /.card-header -->
            <div class="card-body">
            <form method="post">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Bil.</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Action</th>
                    </thead>

                    <tbody>
                        <?php

                        $sql = "SELECT * FROM empmaininfo WHERE Department != 'Human Resources';
                        ";

                        $result = mysqli_query($conn, $sql);
                        if (!$result) {
                            die("Error: " . mysqli_error($conn));
                        }

                        $index = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $uid = $row['First_Name'];
                            $uname = $row["First_Name"];
                            $status = $row['Department'];
                            $role = $row['Active_Inactive'];

                            $index++;

                            echo "
                                    <tr>
                                        <td>$index</td>

                                        <td> $uname </td>

                                        <td>$status</td>
                                        <td>";

                                        if ($row['Active_Inactive'] == 'Active') {
                                            echo "<form method='post'>
                                  <input type='hidden' name='uid' value='$uid'>
                                  <span style='color: green;'>Active</span>
                              </form>";
                                        } elseif ($row['Active_Inactive'] == 'Inactive') {
                                            echo "<form method='post'>
                                  <input type='hidden' name='uid' value='$uid'>
                                  <span style='color: red;'>Deactivate</span>
                              </form>";
                                        }
                                        
                                        echo "</td>";
                                        echo"
                                        <td>
                                            <form action='editStaff.php' method='POST'>
                                                <input type='hidden' value='Update'>

                                                <button class='btn btn-primary' type='submit' name='update'
                                                        id='update' updateid='$uid' value='$uid'>Edit
                                                </button>";

                                                if ($row['Active_Inactive'] == 'Active') {
                                                    echo "<form method='post'>
                                                                                  <input type='hidden' name='uid' value='" . $uid . "'>
                                                                               
                                                                                  <input type='submit' class='btn btn-danger' type='submit' name='Deactivate' value='Deactivate'>
                                                                              ";
                                                } elseif ($row['Active_Inactive'] == 'Inactive') {
                                                    echo "<form method='post'>
                                                                                  <input type='hidden' name='uid' value='" . $uid . "'>
                                                                            
                                                                                  <input type='submit'class='btn btn-success' name='Active' value='Active'>
                                                                              ";
                                                }

                           
                        }

                        ?>

                            <script>
                                function checkdelete() {

                                    return confirm("Are you sure you want to delete this?");
                                }
                            </script>
                        </tbody>
                    </table>
                </form>
                
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
   
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jsGrid -->
    <script src="plugins/jsgrid/demos/db.js"></script>
    <script src="plugins/jsgrid/jsgrid.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

</html>