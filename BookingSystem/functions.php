<?php
session_start();

//$db = mysqli_connect('localhost', 'root', '', 'idrive'); 

include "db_conn.php";

$user_name = "";
$user_password = "";
$errors = array();


if (isset($_POST['return_btn'])) {
    update();
}

if (isset($_POST['approve_return_btn'])) {
    approvereturn();
}
if (isset($_POST['add_vehicle_btn'])) {
    addvehicle();
}
if (isset($_POST['add_room_btn'])) {
    addroom();
}



function addvehicle()
{
    global $db, $errors;


    $jenama = e($_POST['jenama']);
    $model = e($_POST['model']);
    $jenis_kenderaan = e($_POST['jenis_kenderaan']);
    $plat_number = e($_POST['plat_number']);
    $position = e($_POST['position']);


    if (count($errors) == 0) {
        $query = "INSERT INTO hrm_vehicle (jenama, model, jenis_kenderaan, plat_number, position) 
					              VALUES('$jenama', '$model', '$jenis_kenderaan', '$plat_number', '$position')";
        mysqli_query($db, $query);


        $_SESSION['success'] = "Successfully register for the vehicle";
        header('location: list_vehicle.php');
    }
    mysqli_close($db);
}
function addroom()
{
    global $db, $errors;


    $room_name = e($_POST['room_name']);
    $status = e($_POST['status']);
    $position = e($_POST['position']);





    if (count($errors) == 0) {
        $query = "INSERT INTO hrm_room (room_name, status, position) 
					              VALUES('$room_name', '$status', '$position')";
        mysqli_query($db, $query);


        $_SESSION['success'] = "Successfully register for the Room";
        header('location: list_room.php');
    }
    mysqli_close($db);
}
function update()
{
    global $db, $user_name, $errors;

    $id = $_SESSION['user']['id'];
    $status = 'Selesai';

    $query = "UPDATE `hrm_vehicle_use_registration` SET   `status`='" . $status . "', `return_date`= CURRENT_DATE WHERE `id` = $id";
    $result = mysqli_query($db, $query);


    if ($result) {
        echo 'Data Updated';
    } else {
        echo 'Data Not Updated';
    }
    mysqli_close($db);
}



function approvereturn()
{
    global $db, $user_name, $errors;

    $id = 'id';
    $status = 'Selesai';

    $query = "UPDATE `hrm_vehicle_use_registration` SET   `status`='" . $status . "' WHERE `id` = $id";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo 'Data Dikemaskini';
    } else {
        echo 'Data Tidak Dikemaskini';
    }
}

function getUserById($id)
{
    global $db;
    $query = "SELECT * FROM hrm_user WHERE id=" . $id;
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}

// escape string
function e($val)
{
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error()
{
    global $errors;

    if (count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}
// call the login() function if register_btn is clicked


// LOGIN USER



function build_calendar($month, $year, $vehicle)
{
    include "db_conn_cal.php";

    if ($_SESSION['Job_Title'] == "9" || $_SESSION['Job_Title'] == "14" || $_SESSION['admin_surat'] == "1"  || $_SESSION['Job_Title'] == "4" || $_SESSION['Job_Title'] == "8" || $_SESSION['Job_Title'] == "5") {
        $stmt = $mysqli->prepare("SELECT * FROM hrm_vehicle WHERE statusV = 'Active'");
    } else {
        $stmt = $mysqli->prepare("SELECT * FROM hrm_vehicle WHERE statusV = 'Active' and position ='0'");
    }
    $vehicles = "";
    $first_vehicle = 0;
    $i = 0;
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($i == 0) {
                    $first_vehicle = $row['id'];
                }
                $vehicles .= "<option value='" . $row['id'] . "'>" . $row['model'] . " - " . $row['plat_number'] . "</option>";
                $i++;
            }
            $stmt->close();
        }
    }

    if ($vehicle != 0) {
        $first_vehicle = $vehicle;
    }

    // echo "SELECT * FROM management WHERE MONTH(start_date) = '$month' AND YEAR(start_date) = '$year' AND vehicle_id = '$first_vehicle'";

    $stmt = $mysqli->prepare("SELECT * FROM management WHERE MONTH(start_date) = ? AND YEAR(start_date) = ? AND vehicle_id = ? AND `status` NOT IN ('Done', 'Reject')");
    $stmt->bind_param('ssi', $month, $year, $first_vehicle);
    $bookings = array();
    $done = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $date = $row['start_date'];
                $userName = $row['user_name'];
                $status = $row['status'];
                $startTime = $row['start_time'];
                $vehicle_id = $row['vehicle_id'];

                if (isset($start_times[$date])) {
                    $start_times[$date] .= ", $startTime";
                } else {
                    $start_times[$date] = $startTime;
                }

                // Memperbarui struktur data untuk membolehkan dua nama pengguna dalam satu hari
                $bookings[$date][] = $userName;
                $done[$date] = $status;
                $bookings1[$date][] = $vehicle_id;

            }
            $stmt->close();
        }
    }

    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    $numberDays = date('t', $firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    $monthName = $dateComponents['month'];

    $dayOfWeek = $dateComponents['wday'];

    $datetoday = date('Y-m-d');
    $calendar = "<div class='container'><div class='table-responsive'>";
    $calendar .= "<div class='text-center'><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-sm btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a> ";
    $calendar .= " <a href='?month=" . date('m') . "&year=" . date('Y') . "' class='btn btn-sm btn-primary' data-month='" . date('m') . "' data-year='" . date('Y') . "'>Current Month</a> ";
    $calendar .= "<a href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "' class='btn btn-sm btn-primary'>Next Month</a></div>";
    $calendar .= "<form id='vehicle_select_form'>
                    <div class='row'>
                        <div class='col-md-6 col-md-offset-3 form-group'>
                            <label>Select Vehicle</label>
                            <select class='form-select' id='vehicle_select' name='vehicle'>
                                <option value=''>Select Vehicle</option>
                                " . $vehicles . "
                            </select>
                            <input type='hidden' name='month' value='" . $month . "'>
                            <input type='hidden' name='year' value='" . $year . "'>
                        </div>
                    </div>
                </form>
                <table class='table table-bordered'>";
    
    $calendar .= "<tr>";
    
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }
    
    $currentDay = 1;
    $calendar .= "</tr><tr>";
    
    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    
    while ($currentDay <= $numberDays) {
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
    
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-" . sprintf("%02d", $month) . "-$currentDayRel";
        $eventNum = 0;
        $today = $date == date('Y-m-d') ? "today" : "";
    
        if ($date < date('Y-m-d')) {
            if (array_key_exists($date, $done) && $done[$date] === 'Done' && $start_times[$date] != '9am-5pm(Fullday)') {
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a class='btn btn-success btn-sm available'>Available</a>";
            } else {
                $calendar .= "<td><h4>$currentDay</h4> ";
            }
        } else {
            if (array_key_exists($date, $bookings) && ($done[$date] == 'Pending' || $done[$date] == 'Approved' || $done[$date] == 'Return')) {
                $calendar .= "<td class='$today'><h4>$currentDay</h4>";
            
                // Check if there is more than one user or full day booking
                $showButtons = (count($bookings[$date]) > 1 || $start_times[$date] == '9am-5pm(Fullday)');
                $showAvailableButton = (count($bookings[$date]) == 1 && $start_times[$date] != '9am-5pm(Fullday)');
            
                // Unique IDs for divs
                $detailsBoxId = 'details_box_' . $date;
                $detailsBoxAvailableId = 'details_box_available_' . $date;
            
                // Add div for multiple bookings or full day booking
                if ($showButtons) {
                    $calendar .= "<div id='$detailsBoxId' style='display:none'>"; // div to display details
                }
            
                // Add div for available booking
                if ($showAvailableButton) {
                    $calendar .= "<div id='$detailsBoxAvailableId' style='display:none'>"; // div to display details
                }
            
                // Loop to display each reservation
                foreach ($bookings[$date] as $key => $userName) {
                    $startTime = explode(", ", $start_times[$date])[$key];
                    include "db_conn.php";
            
                    $selectQuery1 = "SELECT * FROM `hrm_vehicle` WHERE id = '" . $vehicle_id . "'";
                    $sql = mysqli_query($db, $selectQuery1);
                    $row1 = mysqli_fetch_assoc($sql);
                    $model = $row1["model"];
            
                    // Generate unique ID for the reservation table
                    $reservationTableId = "reservationTable" . $date . "_" . $key;
            
                    // Add reservation table
                    $calendar .= "<table class='reservation-table' id='$reservationTableId'>";
                    $calendar .= "<tbody id='reservation-body'><tr>";
                    $calendar .= "<td>$userName</td>";
                    $calendar .= "<td>$model</td>";
                    $calendar .= "<td>$startTime</td></tr>";
                    $calendar .= "</tbody></table>";
                }
            
                // Close the div for multiple bookings or full day booking
                if ($showButtons) {
                    $calendar .= "</div>";
            
                    // Add JavaScript to toggle all reservation tables
                    $calendar .= "<br><button id='toggleAllButton1' onclick='showDetails(\"$detailsBoxId\")' class='btn btn-warning btn-sm available'>Details</button>";
                    $calendar .= "&nbsp;&nbsp;<button class='btn btn-danger btn-sm booked'>Booked</button>";
                }
            
                // Close the div for available booking
                if ($showAvailableButton) {
                    $calendar .= "</div>";
            
                    // Add JavaScript to toggle available booking details
                    $calendar .= "<br><button id='toggleAllButton1' onclick='showDetails(\"$detailsBoxAvailableId\")' class='btn btn-warning btn-sm available'>Details</button>";
                    $calendar .= " <a href='book.php?date=" . $date . "&vehicle=" . $vehicle . "' class='btn btn-success btn-sm available'>Available</a>";
                }
            
                $calendar .= "</td>";
            } else {
                // Display available slots for future dates
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=" . $date . "&vehicle=" . $vehicle . "' class='btn btn-success btn-sm available'>Available</a></td>";
            }
            
            
            
        }
    
        $calendar .= "</td>";
        $currentDay++;
        $dayOfWeek++;
    }
    
    
    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($l = 0; $l < $remainingDays; $l++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    
    $calendar .= "</tr>";
    $calendar .= "</table></div></div>";
    return $calendar;
    }
    

function build_calendar_adminview($month, $year, $vehicle)
{
    include "db_conn_cal.php";
    if ($_SESSION['Job_Title'] == "9" || $_SESSION['Job_Title'] == "14" || $_SESSION['admin_surat'] == "1"  || $_SESSION['Job_Title'] == "4" || $_SESSION['Job_Title'] == "8" || $_SESSION['Job_Title'] == "5") {

    $stmt = $mysqli->prepare("SELECT * FROM hrm_vehicle WHERE statusV = 'Active'");
    }else{
        $stmt = $mysqli->prepare("SELECT * FROM hrm_vehicle WHERE statusV = 'Active' and position ='0'");
    }
    $vehicles = "";
    $first_vehicle = 0;
    $i = 0;
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($i == 0) {
                    $first_vehicle = $row['id'];
                }
                $vehicles .= "<option value='" . $row['id'] . "'>" . $row['model'] . " - " . $row['plat_number'] . "</option>";
                $i++;
            }
            $stmt->close();
        }
    }

    if ($vehicle != 0) {
        $first_vehicle = $vehicle;
    }

    // echo "SELECT * FROM management WHERE MONTH(start_date) = '$month' AND YEAR(start_date) = '$year' AND vehicle_id = '$first_vehicle'";

    $stmt = $mysqli->prepare("SELECT * FROM management WHERE MONTH(start_date) = ? AND YEAR(start_date) = ? AND vehicle_id = ? AND `status` NOT IN ('Done', 'Reject')");
    $stmt->bind_param('ssi', $month, $year, $first_vehicle);
    $bookings = array();
    $done = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $date = $row['start_date'];
                $userName = $row['user_name'];
                $status = $row['status'];
                $startTime = $row['start_time'];
                $vehicle_id = $row['vehicle_id'];

                if (isset($start_times[$date])) {
                    $start_times[$date] .= ", $startTime";
                } else {
                    $start_times[$date] = $startTime;
                }

                // Memperbarui struktur data untuk membolehkan dua nama pengguna dalam satu hari
                $bookings[$date][] = $userName;
                $done[$date] = $status;
                $bookings1[$date][] = $vehicle_id;

            }
            $stmt->close();
        }
    }

    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    $numberDays = date('t', $firstDayOfMonth);

    $dateComponents = getdate($firstDayOfMonth);

    $monthName = $dateComponents['month'];

    $dayOfWeek = $dateComponents['wday'];

    $datetoday = date('Y-m-d');
    $calendar = "<div class='container'><div class='table-responsive'>";
    $calendar .= "<div class='text-center'><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-sm btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a> ";
    $calendar .= " <a href='?month=" . date('m') . "&year=" . date('Y') . "' class='btn btn-sm btn-primary' data-month='" . date('m') . "' data-year='" . date('Y') . "'>Current Month</a> ";
    $calendar .= "<a href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "' class='btn btn-sm btn-primary'>Next Month</a></div>";
    $calendar .= "<form id='vehicle_select_form'>
                    <div class='row'>
                        <div class='col-md-6 col-md-offset-3 form-group'>
                            <label>Select Vehicle</label>
                            <select class='form-select' id='vehicle_select' name='vehicle'>
                                <option value=''>Select Vehicle</option>
                                " . $vehicles . "
                            </select>
                            <input type='hidden' name='month' value='" . $month . "'>
                            <input type='hidden' name='year' value='" . $year . "'>
                        </div>
                    </div>
                </form>
                <table class='table table-bordered'>";
    
    $calendar .= "<tr>";
    
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }
    
    $currentDay = 1;
    $calendar .= "</tr><tr>";
    
    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    
    while ($currentDay <= $numberDays) {
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
    
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-" . sprintf("%02d", $month) . "-$currentDayRel";
        $eventNum = 0;
        $today = $date == date('Y-m-d') ? "today" : "";
    
        if ($date < date('Y-m-d')) {
            if (array_key_exists($date, $done) && $done[$date] === 'Done' && $start_times[$date] != '9am-5pm(Fullday)') {
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a class='btn btn-success btn-sm available'>Available</a>";
            } else {
                $calendar .= "<td><h4>$currentDay</h4> ";
            }
        } else {
            if (array_key_exists($date, $bookings) && ($done[$date] == 'Pending' || $done[$date] == 'Approved' || $done[$date] == 'Return')) {
                $calendar .= "<td class='$today'><h4>$currentDay</h4>";
            
                // Check if there is more than one user or full day booking
                $showButtons = (count($bookings[$date]) > 1 || $start_times[$date] == '9am-5pm(Fullday)');
                $showAvailableButton = (count($bookings[$date]) == 1 && $start_times[$date] != '9am-5pm(Fullday)');
            
                // Unique IDs for divs
                $detailsBoxId = 'details_box_' . $date;
                $detailsBoxAvailableId = 'details_box_available_' . $date;
            
                // Add div for multiple bookings or full day booking
                if ($showButtons) {
                    $calendar .= "<div id='$detailsBoxId' style='display:none'>"; // div to display details
                }
            
                // Add div for available booking
                if ($showAvailableButton) {
                    $calendar .= "<div id='$detailsBoxAvailableId' style='display:none'>"; // div to display details
                }
            
                // Loop to display each reservation
                foreach ($bookings[$date] as $key => $userName) {
                    $startTime = explode(", ", $start_times[$date])[$key];
                    include "db_conn.php";
            
                    $selectQuery1 = "SELECT * FROM `hrm_vehicle` WHERE id = '" . $vehicle_id . "'";
                    $sql = mysqli_query($db, $selectQuery1);
                    $row1 = mysqli_fetch_assoc($sql);
                    $model = $row1["model"];
            
                    // Generate unique ID for the reservation table
                    $reservationTableId = "reservationTable" . $date . "_" . $key;
            
                    // Add reservation table
                    $calendar .= "<table class='reservation-table' id='$reservationTableId'>";
                    $calendar .= "<tbody id='reservation-body'><tr>";
                    $calendar .= "<td>$userName</td>";
                    $calendar .= "<td>$model</td>";
                    $calendar .= "<td>$startTime</td></tr>";

                    $calendar .= "</tbody></table>";
                }
            
                // Close the div for multiple bookings or full day booking
                if ($showButtons) {
                    $calendar .= "</div>";
            
                    // Add JavaScript to toggle all reservation tables
                    $calendar .= "<br><button id='toggleAllButton1' onclick='showDetails(\"$detailsBoxId\")' class='btn btn-warning btn-sm available'>Details</button>";
                    $calendar .= "&nbsp;&nbsp;<button class='btn btn-danger btn-sm booked'>Booked</button>";
                }
            
                // Close the div for available booking
                if ($showAvailableButton) {
                    $calendar .= "</div>";
            
                    // Add JavaScript to toggle available booking details
                    $calendar .= "<br><button id='toggleAllButton1' onclick='showDetails(\"$detailsBoxAvailableId\")' class='btn btn-warning btn-sm available'>Details</button>";
                    $calendar .= " <a ' class='btn btn-success btn-sm available'>Available</a>";
                }
            
                $calendar .= "</td>";
            } else {
                // Display available slots for future dates
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a ' class='btn btn-success btn-sm available'>Available</a></td>";
            }
            
            
            
        }
    
        $calendar .= "</td>";
        $currentDay++;
        $dayOfWeek++;
    }
    
    
    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($l = 0; $l < $remainingDays; $l++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    
    $calendar .= "</tr>";
    $calendar .= "</table></div></div>";
    return $calendar;
    }


function build_calendar_room_admin($month, $year, $selectedRoom)
{
    include "db_conn_cal.php";

    if ($_SESSION['Job_Title'] == "9" || $_SESSION['Job_Title'] == "14" || $_SESSION['admin_surat'] == "1"  || $_SESSION['Job_Title'] == "4" || $_SESSION['Job_Title'] == "8" || $_SESSION['Job_Title'] == "5") {
        $stmt = $mysqli->prepare("SELECT * FROM hrm_room WHERE status = 'Active' ");
    }else{
    $stmt = $mysqli->prepare("SELECT * FROM hrm_room WHERE status = 'Active' and position ='0'");
    }
    $roomOptions = "";
    $firstRoom = 0;
    $i = 0;
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($i == 0) {
                    $firstRoom = $row['id_room'];
                }
                $roomOptions .= "<option value='" . $row['id_room'] . "'>" . $row['room_name'] . "</option>";
                $i++;
            }
            $stmt->close();
        }
    }

    if ($selectedRoom != 0) {
        $firstRoom = $selectedRoom;
    }

    $start_times = array();
    date_default_timezone_set('Asia/Kuala_Lumpur'); 
    $current_time = date('H:i:s');

      $stmt = $mysqli->prepare("SELECT * FROM management_room WHERE MONTH(start_date) = ? AND YEAR(start_date) = ? AND room_id = ?  AND status = 'Reserved'");
      
    $stmt->bind_param('ssi', $month, $year, $firstRoom);
    $bookings = array();
    $done = array();

    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    $numberDays = date('t', $firstDayOfMonth);

    
    for ($currentDay = 1; $currentDay <= $numberDays; $currentDay++) {
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $done[$date] = ''; // Initialize status as empty string or any default value you prefer
    }

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $date = $row['start_date'];
                $userName = $row['user_name'];
                $status = $row['status'];
                $startTime = $row['start_time'];
                $endTime = $row['end_time'];
                $room_id = $row['room_id'];




                if (isset($start_times[$date])) {
                    $start_times[$date] .= ", $startTime";
                } else {
                    $start_times[$date] = $startTime;
                }
                if (isset($end_times[$date])) {
                    $end_times[$date] .= ", $endTime";
                } else {
                    $end_times[$date] = $endTime;
                }


                // Update data structure to allow multiple user names in a day
                $bookings1[$date][] = $room_id;
                $bookings[$date][] = $userName;
                $done[$date] = $status;
            }
            $stmt->close();
        }
    }

    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    $dayOfWeek = date('w', $firstDayOfMonth);

    $monthName = date('F', $firstDayOfMonth);

    $calendar = "<div class='table-responsive'><table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a> ";
    $calendar .= " <a href='?month=" . date('m') . "&year=" . date('Y') . "' class='btn btn-xs btn-primary' data-month='" . date('m') . "' data-year='" . date('Y') . "'>Current Month</a> ";
    $calendar .= "<a href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "' class='btn btn-xs btn-primary'>Next Month</a></center>";
    $calendar .= "<form id='room_select_form'>
                    <div class='row'>
                        <div class='col-md-6 col-md-offset-3 form-group'>
                            <label>Select Room</label>
                            <select class='form-select' id='room_select' name='room'>
                                <option value=''>Select Room</option>
                                " . $roomOptions . "
                            </select>
                            <input type='hidden' name='month' value='" . $month . "'>
                            <input type='hidden' name='year' value='" . $year . "'>
                        </div>
                    </div>
                </form>
                <div class='table-responsive'><table class='table table-bordered'>";
    
    $calendar .= "<tr>";
    
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }
    
    $currentDay = 1;
    $calendar .= "</tr><tr>";
    
    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    while ($currentDay <= $numberDays) {
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
    
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-" . sprintf("%02d", $month) . "-$currentDayRel";
        $eventNum = 0;
        $today = $date == date('Y-m-d') ? "today" : "";
        if ($date < date('Y-m-d')) {
            if (array_key_exists($date, $bookings) && ($done[$date] == 'Reserved')) {
    
                $calendar .= "<td class='$today'><h4>$currentDay</h4>";
    
                $calendar .= "</td>";
            } else {
                $calendar .= "<td class='$today'><h4>$currentDay</h4>";
            }
        } else {
            if (isset($done[$date]) && $done[$date] == "Reserved") {
                $calendar .= "<td class='$today'><h4>$currentDay</h4> ";
                
                $calendar .= "<div id='details_box_$date' style='display:none'>";
                
                foreach ($bookings[$date] as $key => $userName) {
                    $startTime = explode(", ", $start_times[$date])[$key];
                    $endTime = explode(", ", $end_times[$date])[$key];
                    include "db_conn.php";
                
                    $selectQuery1 = "SELECT * FROM `hrm_room` WHERE id_room = '" . $room_id . "'";
                    $sql = mysqli_query($db, $selectQuery1);
                    $row1 = mysqli_fetch_assoc($sql);
                    $room = $row1["room_name"];
                
                    $reservationTableId = "reservationTable_" . $date . "_" . $key;
                
                    // Add reservation table
                 


$calendar .= "<table class='reservation-table' id='$reservationTableId'>";
$calendar .= "<tbody id='reservation-body'><tr>";
$calendar .= "<td>$userName</td>";
$calendar .= "<td>$room</td>";
$calendar .= "<td>$startTime until $endTime</td>";
$calendar .= "<td>$status</td></tr>";
$calendar .= "</tbody></table>";
                }
                
                $calendar .= "</div>"; // Close the div
                
                $calendar .= "<br><a class='btn btn-success btn-xs available'>Available</a> ";
                $calendar .= "<button id='toggleAllButton_$date' onclick='showDetails(\"details_box_$date\")' class='btn btn-warning btn-xs available'>Details</button>";
                
                $calendar .= "</td>";
                
                $calendar .= "<script>
                function showDetails(detailsBoxId) {
                    var allDetailsBoxes = document.querySelectorAll('[id^=details_box_]');
                    allDetailsBoxes.forEach(function(box) {
                        if (box.id !== detailsBoxId) {
                            box.style.display = 'none';
                        }
                    });
                    
                    var detailsBox = document.getElementById(detailsBoxId);
                    if (detailsBox.style.display === 'none') {
                        detailsBox.style.display = 'block';
                    } else {
                        detailsBox.style.display = 'none';
                    }
                }
                </script>";
            } else {
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a &room=" . $selectedRoom . "'
                class='btn btn-success btn-xs available'>Available</a>";
            }
            
            
        }
    
        $calendar .= "</td>";
        $currentDay++;
        $dayOfWeek++;
    }
    
    $calendar .= "</tr></table></div>"; // Close the table-responsive div
    

    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($l = 0; $l < $remainingDays; $l++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    $calendar .= "</tr>";
    $calendar .= "</table>";
    return $calendar;
}

function build_calendar_room_user1($month, $year, $selectedRoom)
{
    include "db_conn_cal.php";
    if ($_SESSION['Job_Title'] == "9" || $_SESSION['Job_Title'] == "14" || $_SESSION['admin_surat'] == "1"  || $_SESSION['Job_Title'] == "4" || $_SESSION['Job_Title'] == "8" || $_SESSION['Job_Title'] == "5") {
        $stmt = $mysqli->prepare("SELECT * FROM hrm_room WHERE status = 'Active' ");
}else{
$stmt = $mysqli->prepare("SELECT * FROM hrm_room WHERE status = 'Active' and position ='0'");
}
    $roomOptions = "";
    $firstRoom = 0;
    $i = 0;
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($i == 0) {
                    $firstRoom = $row['id_room'];
                }
                $roomOptions .= "<option value='" . $row['id_room'] . "'>" . $row['room_name'] . "</option>";
                $i++;
            }
            $stmt->close();
        }
    }

    if ($selectedRoom != 0) {
        $firstRoom = $selectedRoom;
    }

    $start_times = array(); 

    date_default_timezone_set('Asia/Kuala_Lumpur'); 
    $current_time = date('H:i:s');

      $stmt = $mysqli->prepare("SELECT * FROM management_room WHERE MONTH(start_date) = ? AND YEAR(start_date) = ? AND room_id = ?  AND status = 'Reserved'");
      
      
    
    $stmt->bind_param('ssi', $month, $year, $firstRoom);
    $bookings = array();
    $done = array();

    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    $numberDays = date('t', $firstDayOfMonth);

    for ($currentDay = 1; $currentDay <= $numberDays; $currentDay++) {
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $done[$date] = ''; 
    }

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $date = $row['start_date'];
                $userName = $row['user_name'];
                $status = $row['status'];
                $startTime = $row['start_time'];
                $endTime = $row['end_time'];
                $room_id = $row['room_id'];




                if (isset($start_times[$date])) {
                    $start_times[$date] .= ", $startTime";
                } else {
                    $start_times[$date] = $startTime;
                }
                if (isset($end_times[$date])) {
                    $end_times[$date] .= ", $endTime";
                } else {
                    $end_times[$date] = $endTime;
                }


                // Update data structure to allow multiple user names in a day
                $bookings1[$date][] = $room_id;
                $bookings[$date][] = $userName;
                $done[$date] = $status;
            }
            $stmt->close();
        }
    }

    $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    $dayOfWeek = date('w', $firstDayOfMonth);

    $monthName = date('F', $firstDayOfMonth);

    $calendar = "<div class='table-responsive'><table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a> ";
    $calendar .= " <a href='?month=" . date('m') . "&year=" . date('Y') . "' class='btn btn-xs btn-primary' data-month='" . date('m') . "' data-year='" . date('Y') . "'>Current Month</a> ";
    $calendar .= "<a href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "' class='btn btn-xs btn-primary'>Next Month</a></center>";
    $calendar .= "<form id='room_select_form'>
                    <div class='row'>
                        <div class='col-md-6 col-md-offset-3 form-group'>
                            <label>Select Room</label>
                            <select class='form-select' id='room_select' name='room'>
                                <option value=''>Select Room</option>
                                " . $roomOptions . "
                            </select>
                            <input type='hidden' name='month' value='" . $month . "'>
                            <input type='hidden' name='year' value='" . $year . "'>
                        </div>
                    </div>
                </form>
                <div class='table-responsive'><table class='table table-bordered'>";
    
    $calendar .= "<tr>";
    
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }
    
    $currentDay = 1;
    $calendar .= "</tr><tr>";
    
    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    while ($currentDay <= $numberDays) {
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
    
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-" . sprintf("%02d", $month) . "-$currentDayRel";
        $eventNum = 0;
        $today = $date == date('Y-m-d') ? "today" : "";
        if ($date < date('Y-m-d')) {
            if (array_key_exists($date, $bookings) && ($done[$date] == 'Reserved')) {
    
                $calendar .= "<td class='$today'><h4>$currentDay</h4>";
    
                $calendar .= "</td>";
            } else {
                $calendar .= "<td class='$today'><h4>$currentDay</h4>";
            }
        } else {
            if (isset($done[$date]) && $done[$date] == "Reserved") {
                $calendar .= "<td class='$today'><h4>$currentDay</h4> ";
                
                $calendar .= "<div id='details_box_$date' style='display:none'>";
                
                foreach ($bookings[$date] as $key => $userName) {
                    $startTime = explode(", ", $start_times[$date])[$key];
                    $endTime = explode(", ", $end_times[$date])[$key];
                    include "db_conn.php";
                
                    $selectQuery1 = "SELECT * FROM `hrm_room` WHERE id_room = '" . $room_id . "'";
                    $sql = mysqli_query($db, $selectQuery1);
                    $row1 = mysqli_fetch_assoc($sql);
                    $room = $row1["room_name"];
                
                    $reservationTableId = "reservationTable_" . $date . "_" . $key;
                
                    // Add reservation table
                    $calendar .= "<table class='reservation-table' id='$reservationTableId'>";
                    $calendar .= "<tbody id='reservation-body'><tr>";
                    $calendar .= "<td>$userName</td>";
                    $calendar .= "<td>$room</td>";
                    $calendar .= "<td>$startTime until $endTime</td>";
                    $calendar .= "<td>$status</td></tr>";
                    $calendar .= "</tbody></table>";
                }
                
                $calendar .= "</div>"; // Close the div
                
                $calendar .= "<br><a href='book_room.php?date=" . $date . "&room=" . $selectedRoom . "'
                             class='btn btn-success btn-xs available'>Available</a> ";
                $calendar .= "<button id='toggleAllButton_$date' onclick='showDetails(\"details_box_$date\")' class='btn btn-warning btn-xs available'>Details</button>";
                
                $calendar .= "</td>";
            } else {
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='book_room.php?date=" . $date . "&room=" . $selectedRoom . "'
                            class='btn btn-success btn-xs available'>Available</a>";
            }
            
            $calendar .= "<script>
            function showDetails(detailsBoxId) {
                var allDetailsBoxes = document.querySelectorAll('[id^=details_box_]');
                allDetailsBoxes.forEach(function(box) {
                    box.style.display = 'none';
                });
                var detailsBox = document.getElementById(detailsBoxId);
                detailsBox.style.display = 'block';
            }
            </script>";
            
            
        }
    
        $calendar .= "</td>";
        $currentDay++;
        $dayOfWeek++;
    }
    
    $calendar .= "</tr></table></div>"; // Close the table-responsive div
    

    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($l = 0; $l < $remainingDays; $l++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    $calendar .= "</tr>";
    $calendar .= "</table>";
    return $calendar;
}

?>
<style>
    body {
        font-family: 'Arial', sans-serif;
    }

    .bold {
        font-weight: bold;
    }

    .reservation-link {
        text-decoration: none;
        color: #333;
    }

    .reservation-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.9em;
    }

    .reservation-table th,
    .reservation-table td {
        border: 1px solid #ddd;
        padding: 6px;
    }

    .reservation-table th {
        background-color: #f8f8f8;
        font-family: 'Verdana', sans-serif;
    }

    .reservation-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .reservation-table tr:hover {
        background-color: #e0e0e0;
    }

    .bx {
        display: inline-block;
        width: 24px; /* Saiz bulatan yang sedikit lebih besar */
        height: 24px;
        background: linear-gradient(135deg, #f0f0f0, #e0e0e0); /* Gradien latar belakang */
        border-radius: 50%;
        margin-right: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Bayang-bayang lembut */
        border: 2px solid #bbb; /* Garis tepi yang lebih menonjol */
        transition: background 0.3s, transform 0.3s; /* Transisi yang lembut */
    }

    .bx:hover {
        background: linear-gradient(135deg, #e0e0e0, #f0f0f0); /* Gradien latar belakang berubah pada hover */
        transform: scale(1.1); /* Kesan pembesaran pada hover */
    }

    .table-container {
        overflow-x: auto;
        padding: 10px;
    }

    @media screen and (max-width: 600px) {
        .reservation-table {
            overflow-x: auto;
            display: block;
        }

        .reservation-table th,
        .reservation-table td {
            white-space: nowrap;
            min-width: 80px;
        }
    }
</style>


