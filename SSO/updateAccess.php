<?php
// Assuming you have a database connection already established

// Retrieve the value from the POST data
$accessSurat = isset($_POST['access_surat']) ? $_POST['access_surat'] : 0;

// Update the database
// Note: You need to replace 'your_table_name' with your actual table name and 'your_column_name' with the actual column name.
$sql = "UPDATE your_table_name SET your_column_name = '$accessSurat' WHERE <your_condition>";
// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>