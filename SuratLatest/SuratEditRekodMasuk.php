<?php
 include('functions.php'); 


if(isset($_POST['view'])){
  $user_id = $_GET['Internal_Id'];    

echo "ok boleh view";
}

// Close the database

    /*if (isset($_POST['approved']))
    {
        $appUpdateQuery = "UPDATE bookings SET status= 'APPROVED' WHERE id='".$_POST['row_id']."'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);

    }
        
    if (isset($_POST['rejected']))
    {
$s="CANCEL BY STAFF";

        $rejUpdateQuery = "INSERT INTO cancel (id, date, user_id, user_name, purpose, destination, driver_name, vehicle_id, model_plat)
      SELECT id, date, user_id, user_name, purpose, destination, driver_name, vehicle_id, model_plat FROM bookings WHERE id='".$_POST['row_id']."'";
        $rejUpdateResult = mysqli_query($db,$rejUpdateQuery);

              $rejUpdateQuery1 = "DELETE FROM bookings WHERE id='".$_POST['row_id']."'";
        $rejUpdateResult1 = mysqli_query($db,$rejUpdateQuery1);


    }
        if (isset($_POST['return']))
    {

        $appUpdateQuery = "UPDATE bookings SET status= 'RETURN VEHICLE' WHERE id='".$_POST['row_id']."'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);
                $appUpdateQuery1 = "UPDATE management SET status= 'RETURN VEHICLE' WHERE id='".$_POST['row_id']."'";
        $appUpdateResult1 = mysqli_query($db, $appUpdateQuery1);
    }*/
    if (empty($_SESSION['First_Name'])) {
      header("Location: iout.php");
      exit();
      }
?>

<!DOCTYPE html>
<html lang = "en">
<head>
  <!-- <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MICTH | IntSys</title> -->

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Incoming Letter</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- <meta http-equiv="refresh" content="15"> -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Favicons -->
    <link href="assets/img/micthlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<style>
.sb{
	box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
	height:100%;
	width:100%;
	background-color: white;
	border: 1px solid white;
	overflow:auto;
	white-space: nowrap;
}
</style>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../main_user.php" class="logo d-flex align-items-center">
        <img src="../logomicth.png" alt="">
        <span class="d-none d-lg-block">MICTH System
        </span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">


          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">

            <li>
              <hr class="dropdown-divider">
            </li>


          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">


          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">


          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              Me</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['First_Name']; ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="iout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-envelope-fill"></i><span>Letter System</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="SuratHome.php">
              <i class="bi bi-house-door-fill" style="font-size: 1em"></i><span>Home</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="SuratDaftarSuratKeluar.php">
              <i class="bi bi-pencil-square" style="font-size: 1em"></i><span>Register Outgoing Letter</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="SuratRekodSuratKeluar.php">
              <i class="bi bi-file-earmark-text" style="font-size: 1em"></i><span>Outgoing Letter Record</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="SuratDaftarSuratMasuk.php">
              <i class="bi bi-pencil-square" style="font-size: 1em"></i><span>Register Incoming Letter</span>
            </a>
          </li>
        </ul>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="SuratRekodSuratMasuk.php" class="active">
              <i class="bi bi-file-earmark-text" style="font-size: 1em; background-color: transparent"></i><span>Incoming Letter Record</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="../main_user.php">
          <i class="bi bi-reply-fill"></i>
          <span>Home Page</span>
        </a>
      </li>
  </aside><!-- End Sidebar-->
  <main id="main" class="main">

  <div class="pagetitle">
    <h1>Update Incoming Letter</strong></h1>
    <nav>
      <ol class="breadcrumb" style="background-color: transparent; margin-bottom: 16px">
        <li class="breadcrumb-item"><a href="SuratHome.php">Home Page</a></li>
        <li class="breadcrumb-item"><a href="SuratRekodSuratMasuk.php">Incoming Letter Record</a></li>
        <li class="breadcrumb-item active">Update Incoming Record</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-20">
        <div class="row">
          <!-- Recent Sales -->
        </div>
      </div>
      <div class="col-12">
        <div class="card top-selling">
          <div class="sb">
            <div class="card-body">
              <h5 class="card-title"><strong>IN LETTER INFORMATION</strong><br/>
              <!-- List and select category from field form -->
                <?php

                // Check if the 'id' parameter is present in the URL
                if (isset($_GET['id'])) {
                  // Get the 'id' from the URL
                  $id = $_GET['id'];

                  // Fetch the record from the database using the 'id'
                  $query = "SELECT * FROM tbl_surat_in WHERE id = ?";
                  $stmt = $db->prepare($query);
                  $stmt->bind_param("i", $id);
                  $stmt->execute();
                  $result = $stmt->get_result();

                  // Check if a record was found
                  if ($result->num_rows > 0) {
                    $record = $result->fetch_assoc();
                  // Display the record in a form for editing
                    } else {
                      echo "Record not found.";
                    }

                    $stmt->close();
                      } else {
                        echo "No ID provided.";
                      }
                  ?>
              <div class="row"  style="margin-top: 10px">
                <div class="col-md-12">
                  <!-- General form elements -->
                    <!-- /.box-header -->
                    <!-- Form start -->
                    <form role="form" action="" method="post">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">Registration Date: * </label>
                            <div class="input-group">
                              <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px" class="form-control" id="InputDate" name="InputDate" value="<?php echo isset($record['date']) ? $record['date'] : ''; ?>" readonly>
                            </div>
                          </div>
                        </div>   
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">Recorded by: *</label>
                                    <div class="input-group">
                                      <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                        class="form-control" id="direkodkan_oleh" name="direkodkan_oleh" value="<?php echo isset($record['direkodkan_oleh']) ? $record['direkodkan_oleh'] : ''; ?>" readonly><br>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">Sender: *</label>
                                    <div class="input-group" style="flex-grow: 1;">
                                    <textarea class="form-control" style="font-size: 1.4rem; line-height: 1.5"
                                      rows="3" cols="50" id="from_dpd" name="from_dpd" required><?php echo isset($record['from_dpd']) ? htmlspecialchars($record['from_dpd']) : ''; ?></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">Subject / Title: *</label>
                                    <div class="input-group" style="flex-grow: 1;">
                                    <textarea class="form-control" style="font-size: 1.4rem; line-height: 1.5"
                                      rows="3" cols="50" id="title" name="title" required><?php echo isset($record['title']) ? htmlspecialchars($record['title']) : ''; ?></textarea>
                                  </div>
                                </div>
                              </div>
                                <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">Letter Reference No: *</label>
                                    <div class="input-group" style="flex-grow: 1;">
                                    <textarea class="form-control" style="font-size: 1.4rem; line-height: 1.8; height: 34px"
                                      rows="3" cols="50" id="no_surat_pengirim" name="no_surat_pengirim" required><?php echo isset($record['no_surat_pengirim']) ? htmlspecialchars($record['no_surat_pengirim']) : ''; ?></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">MICTH Reference No: *</label>
                                    <div class="input-group" style="flex-grow: 1;">
                                    <textarea class="form-control" style="font-size: 1.4rem; line-height: 1.8; height: 34px"
                                      rows="3" cols="50" id="no_rujukan_micth" name="no_rujukan_micth" required><?php echo isset($record['no_rujukan_micth']) ? htmlspecialchars($record['no_rujukan_micth']) : ''; ?></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">Action By: *</label>
                                    <div class="input-group">
                                      <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                        class="form-control" id="tindakan" name="tindakan" value="<?php echo isset($record['tindakan']) ? $record['tindakan'] : ''; ?>" readonly><br>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleInputEmail1" style="font-weight: 400; 'Nunito', sans-serif;">Status: *</label>
                                    <div class="input-group">
                                      <input type="text" style="font-size: 1.4rem; line-height: 1.0; height: 34px"
                                        class="form-control" id="status" name="status" value="<?php echo isset($record['status']) ? $record['status'] : ''; ?>" required><br>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              </div>
                                <br>
                      <!-- /.box-body -->
                      <div class="col-md-2">
                        <div class="form-group">
                          <button type="submit" name="update_item" id="update_item" class="btn btn-success btn-lg" style="font-size: 15px">Update</button>
                          <button type="submit" name="reset" id="reset" class="btn btn-danger btn-lg" style="font-size: 15px">Reset</button>
                        </div>
                      </div>
                    </form>
                  <!-- /.box -->
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>


    </div>
       <!-----------------------------------------------------------------------INSERT REKOD--------------------------------------------------------------------------------------------->
       <?php
    function paparMesejBerjayaAset($no_surat_pengirim, $no_rujukan_micth) {
    // Create the data preview string
    $dataPreview = '';
    $dataPreview .= 'Letter Refference No: ' . $no_surat_pengirim . '\\n';
    $dataPreview .= 'MICTH Refference No: ' . $no_rujukan_micth . '\\n';

  
    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    echo '<script type="text/javascript">
    swal({
        title: "Done!",
        text: "Data has been successfully inserted.\\n\\n' . $dataPreview . '",
        icon: "success",
        button: "Okay",
      }).then(function() {
        window.location = "SuratRekodSuratMasuk.php";
      });
    </script>';
  }

   //Keluarkan notification untuk mesej GAGAL
  function paparMesejGagalSimpan() {
    echo '<script type="text/javascript">
    Swal.fire({
        title: "Error!",
        text: "Oops! An error occurred, failed to add new record!",
        icon: "error",
        confirmButtonText: "OK"
    }).then((result) => {
        if (result.isConfirmed) {
            history.go(-1);
        }
    });
    </script>';
    exit();
}

//Keluarkan notification untuk mesej GAGAL
function paparMesejGagalSimpanalready() {
    echo '<script type="text/javascript">
    Swal.fire({
        title: "Error!",
        text: "Oops! An error occurred, The record has already been inserted.!",
        icon: "error",
        confirmButtonText: "OK"
    }).then((result) => {
        if (result.isConfirmed) {
            history.go(-1);
        }
    });
    </script>';
    exit();
}

//Update Items
if (isset($_POST['update_item'])) {
  $from_dpd = isset($_POST['from_dpd']) ? $_POST['from_dpd'] : '';
  $tajuk_surat = isset($_POST['title']) ? $_POST['title'] : '';
  $no_surat_pengirim = isset($_POST['no_surat_pengirim']) ? $_POST['no_surat_pengirim'] : '';
  $no_rujukan_micth = isset($_POST['no_rujukan_micth']) ? $_POST['no_rujukan_micth'] : '';
  $tindakan = isset($_POST['tindakan']) ? $_POST['tindakan'] : '';
  $statuss = isset($_POST['status']) ? $_POST['status'] : '';

  // Ensure $id is set correctly
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      
      // Update query
      $query = "UPDATE tbl_surat_in 
                SET from_dpd=?, title=?, no_surat_pengirim=?, no_rujukan_micth=?, tindakan=?, status=? 
                WHERE id=?";

      // Prepare and bind parameters
      $stmt = $db->prepare($query);
      $stmt->bind_param("ssssssi", $from_dpd, $tajuk_surat, $no_surat_pengirim, $no_rujukan_micth, $tindakan, $statuss, $id);

      // Execute the query
      if ($stmt->execute()) {
          paparMesejBerjayaAset($no_surat_pengirim, $no_rujukan_micth);
      } else {
          paparMesejGagal();
      }

      $stmt->close();
  } else {
      paparMesejGagal1();
  }
}

?>
  </section>

  </main><!-- End #main -->

  
  <footer id="footer" class="footer">
    <div class="copyright">
      Copyright &copy; <script>
        document.write(new Date().getFullYear())
      </script>
      <strong><span>MICTH SYSTEM</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <a href="https://www.micth.com//">MELAKA ICT HOLDINGS SDN. BHD.</a>
    </div>
  </footer><!-- End Footer -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    function checkInput() {
    const middleInput = document.getElementById('InputNoRujukanSuratTgh').value;
    const endInput = document.getElementById('InputNoRujukanSuratAkhir');

    if (middleInput) {
        endInput.value = `/${new Date().toLocaleString('default', { month: 'short' }).toUpperCase()}${new Date().getFullYear()}`;
    } else {
        endInput.value = `${new Date().toLocaleString('default', { month: 'short' }).toUpperCase()}${new Date().getFullYear()}`;
    }
  }

// Initialize the default state
checkInput();
</script>

  

</body>
</html>
