<main id="main" class="main">

<div class="pagetitle">
    <h1>Booking Form</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="user.php">Home Page</a></li>
            <li class="breadcrumb-item">view booking</li>
            <li class="breadcrumb-item active">Booking</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">


    <?php


    if (!isset($_SESSION['updateid'])) {

        exit("Error: 'updateid' tidak ditemukan di sesi.");
    }

    $id = $_SESSION['updateid'];
    $sql = "SELECT * FROM management WHERE id = '$id'";
    $result = mysqli_query($db, $sql);


    if (!$result) {
        exit("Error: " . mysqli_error($db));
    }

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

    } else {

        exit("Error: Tidak ada data yang ditemukan untuk id '$id'.");
    }

    ?>

    <?php

    $statuses = ['Booking', 'Approved', 'Key', 'Return'];

    foreach ($statuses as $status) {
        $selectQuery = "SELECT * FROM `management` WHERE `status` = '$status' ORDER BY `id` ASC";
        $sql = mysqli_query($db, $selectQuery);
        $count = mysqli_num_rows($sql);
        $i = 1;

        if ($count > 0) {
            while ($row = mysqli_fetch_array($sql)) {

                switch ($status) {
                    case 'Booking':

                        ?>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">

                                        <br>
                                        <?php echo (isset($msg)) ? $msg : ""; ?>
                                        <!--<form class="row g-3" action="" method="post">-->
                                        <form class="row g-3" action="" method="post">
                                            <div class="col-md-6">
                                                <label for="staff_name" class="form-label">Staff/Driver Name</label>
                                                <input type="text" id="staff_name" class="form-control"
                                                    value="<?php echo $row['user_name']; ?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="vehicle" class="form-label">Vehicle</label>
                                                <input required type="text" id="vehicle" class="form-control"
                                                    value="<?php echo $row['model_plat']; ?>" disabled>
                                                <input required type="hidden" name="vehicleinp"
                                                    value="<?php echo $row['model_plat']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="start_date" class="form-label">Start Date Booking</label>
                                                <input type="text" id="start_date" class="form-control"
                                                    value="<?php echo $row['start_date']; ?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="end_date" class="form-label">End Date Booking</label>
                                                <input required type="date" id="end_date" class="form-control" name="end_date"
                                                    value="<?php echo $row['end_date']; ?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="purpose" class="form-label">Purpose</label>
                                                <input required type="text" id="purpose" class="form-control" name="purpose"
                                                    value="<?php echo $row['purpose']; ?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="destination" class="form-label">Destination</label>
                                                <input required type="text" id="destination" class="form-control" name="destination"
                                                    value="<?php echo $row['destination']; ?>" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="row mb-3">
                                                    <legend class="col-form-label col-sm-6 pt-0">Duration time Booking:</legend>
                                                    <input required type="text" class="form-control" name="duration_time"
                                                        value="<?php echo $row['start_time']; ?>" disabled>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset class="row mb-3">
                                                    <legend class="col-form-label col-sm-4 pt-0">With:</legend>
                                                    <input class="form-control" type="text"
                                                        value="<?php echo ($row['fuel_card'] == 1 ? 'Fuel Card' : '') . ($row['tng_card'] == 1 ? ', Touch \'n Go Card' : ''); ?>"
                                                        disabled>
                                                </fieldset>
                                            </div>
                                        </form>


                                    </div>

                                </div>
                            </div>
                        </div>
                        <form method="post" action="">
                            <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                            <button class="btn btn-success" type="submit" name="approve">Approve</button>
                        </form>
                        <button class="dropdown-item btn btn-danger" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@mdo" name="reject">Reject</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Please provide the reason for
                                                            the
                                                            rejection.</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" id="rejectForm">
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Reason:</label>
                                                                <textarea class="form-control" id="message-text"
                                                                    name="rejection_reason"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                                                                <button type="submit" name="reject" form="rejectForm"
                                                                    class="btn btn-info">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                    document.querySelectorAll('.modal .btn-close').forEach(function (btn) {
                                        btn.addEventListener("click", function () {
                                            document.querySelector('.bg-modal').style.display = "none";
                                        });
                                    });

                                </script>

                        <?php
                        break;

                    case 'Approved':

                        ?>

                        <form method="post" action="">
                            <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                            <button class="btn btn-info" type="submit" name="takekey">Key</button>
                        </form>

                        <?php
                        break;

                    case 'Key':

                        ?>

                        <form method="post" action="">
                            <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                            <button class="btn btn-warning" type="submit" name="return">Return</button>
                        </form>

                        <?php
                        break;

                    case 'Return':

                        ?>

                        <form method="post" action="">
                            <input type="hidden" name="row_id" value="<?= $row['id']; ?>" />
                            <button class="btn btn-warning" type="submit" name="return">Return</button>
                        </form>

                        <?php
                        break;



                    default:

                        break;
                }
                $i++;
            }
        } else {

            ?>

            <?php
        }
    }

    if (isset($_POST['approve'])) {
        $appUpdateQuery = "UPDATE management SET status= 'Approved' WHERE id='" . $_POST['row_id'] . "'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);
    }

    if (isset($_POST['takekey'])) {
        $appUpdateQuery = "UPDATE management SET status= 'Return' WHERE id='" . $_POST['row_id'] . "'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);

    }

    if (isset($_POST['return'])) {
        $appUpdateQuery = "UPDATE management SET status= 'Done' WHERE id='" . $_POST['row_id'] . "'";
        $appUpdateResult = mysqli_query($db, $appUpdateQuery);
    }

    if (isset($_POST['reject'])) {
        if (isset($_POST['row_id'])) {
            $row_id = $_POST['row_id'];
            $appUpdateQuery = "UPDATE management SET status= 'Reject' WHERE id='$row_id'";
            $appUpdateResult = mysqli_query($db, $appUpdateQuery);

            if (isset($_POST['rejection_reason'])) {
                $reason = $_POST['rejection_reason'];
                $sql1 = "INSERT INTO reject_r (id, sebab) VALUES ('', '$reason')";
                $result = mysqli_query($db, $sql1);
                if (!$result) {
                    echo "Error: " . mysqli_error($db);
                }
            } else {
                echo "Rejection reason is not set.";
            }
        } else {
            echo "Row ID is not set.";
        }
    }
    ?>

</section>

</main><!-- End #main -->


