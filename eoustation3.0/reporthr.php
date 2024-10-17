<?php
session_start();
include "db_conn.php";

$fname = $_SESSION['user_name'];

$uid = $_SESSION['id'];

if (isset($_POST["update"])) {
    $_SESSION['updateid'] = $_POST['update'];

    header("Location: checkin.php");
    exit();
}

if (isset($_POST["delete"])) {
    $delete = $_POST['delete'];
    $sql = "DELETE FROM `outstation` WHERE id='$delete'";
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
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">


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
                                    <th rowspan="2">Bil.</th>

                                    <th rowspan="2">Name</th>
                                    <th rowspan="2">Emp Num</th>
                                    <th rowspan="2">Location</th>
                                    <th rowspan="2">Purpose</th>

                                    <th colspan="3">Date/Time
                                </tr>
                                </centre>

                                <td>Check Out</td>
                                <td>Check In </td>
                                <td>Timestamp </td>
                            </thead>
                            <tbody>
                                <?php




                                $sql = "SELECT * FROM outstation WHERE name = '$fname'";

                                $result = mysqli_query($conn, $sql);
                                $index = 0;
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $id = $row['id'];
                                        $name = $row["name"];
                                        $location = $row['location'];
                                        $purpose = $row['purpose'];
                                        $dateOut = $row['dateOut'];
                                        $timeOut = $row['timeOut'];
                                        $dateIn = $row['dateIn'];
                                        $timeIn = $row['timeIn'];
                                        $timeCu = $row['timeCu'];
                                        $emp_no = $row['emp_no'];
                                        $index++;

                                        echo "
                                          <tr>
                                          <td>$index</td>
                                            
                                                <td>$name</td>
                                                <td>
                                                $emp_no
                                                </td>
                                                <td>$location</td>
                                                <td>$purpose</td>
                                                <td>$dateOut/$timeOut</td>
                                                <td>$dateIn/$timeIn  
                                          
                                               
                                                    </td>
                                                    <td>
                                                    $timeCu
                                                    </td>
                                                    
                                                   
                                            </tr>
                                        ";
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                        <script>
                            function checkdelete() {

                                return confirm("Are you sure you want to delete this?");
                            }
                        </script>
                    </form>
                    <style>
                        .button {
                            width: 40px;
                            height: 40px;
                            border-radius: 50%;
                            background-color: rgb(20, 20, 20);
                            border: none;
                            font-weight: 600;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
                            cursor: pointer;
                            transition-duration: .3s;
                            overflow: hidden;
                            position: relative;
                        }

                        .svgIcon {
                            width: 12px;
                            transition-duration: .3s;
                        }

                        th {
                            text-align: center;
                        }

                        .table {
                            margin-left: auto;
                            margin-right: auto;
                        }

                        .svgIcon path {
                            fill: white;
                        }

                        .button:hover {
                            width: 130px;
                            border-radius: 50px;
                            transition-duration: .3s;
                            background-color: rgb(255, 69, 69);
                            align-items: center;
                        }

                        .button:hover .svgIcon {
                            width: 40px;
                            transition-duration: .3s;
                            transform: translateY(60%);
                        }

                        .button::before {
                            position: absolute;
                            top: -20px;
                            content: "Delete";
                            color: white;
                            transition-duration: .3s;
                            font-size: 2px;
                        }

                        .button:hover::before {
                            font-size: 13px;
                            opacity: 1;
                            transform: translateY(30px);
                            transition-duration: .3s;
                        }

                        .Btn {
                            position: relative;
                            display: flex;
                            align-items: center;
                            justify-content: flex-start;
                            width: 90px;
                            height: 30px;
                            border: none;
                            padding: 0px 20px;
                            background-color: rgb(168, 38, 255);
                            color: white;
                            font-weight: 500;
                            cursor: pointer;
                            border-radius: 10px;
                            box-shadow: 5px 5px 0px rgb(140, 32, 212);
                            transition-duration: .3s;
                        }

                        .svg {
                            width: 13px;
                            position: absolute;
                            right: 0;
                            margin-right: 20px;
                            fill: white;
                            transition-duration: .3s;
                        }

                        .Btn:hover {
                            color: transparent;
                        }

                        .Btn:hover svg {
                            right: 43%;
                            margin: 0;
                            padding: 0;
                            border: none;
                            transition-duration: .3s;
                        }

                        .Btn:active {
                            transform: translate(3px, 3px);
                            transition-duration: .3s;
                            box-shadow: 2px 2px 0px rgb(140, 32, 212);
                        }
                    </style>
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
    <!-- AdminLTE for demo purposes -->

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
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

</body>

</html>