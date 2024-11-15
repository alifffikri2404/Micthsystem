<?php
header('Content-Type: application/json');

require('configAsetTPS.php');


if ($conn2->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed']));
}

$barcode = $_POST['barcode'];

$stmt = $conn2->prepare("SELECT * 
FROM asset_management_vba
WHERE `Full_ID (Concatenated ID)` = ?");
$stmt->bind_param("s", $barcode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $no_aset = $row['no_aset'];
    
    echo json_encode(['status' => 'success', 'no_aset' => $no_aset]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Barcode not found in the database']);
}

$stmt->close();
$conn2->close();
?>
