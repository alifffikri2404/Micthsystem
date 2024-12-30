<?php
// Include the database connection file
require_once 'db_conn.php';

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the input to prevent SQL injection

    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM tbl_surat_in WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);

    if ($stmt) {
        // Bind the parameter
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect with a success message
            header("Location: SuratRekodSuratMasuk.php?message=Record+deleted+successfully");
            exit();
        } else {
            // Redirect with an error message
            header("Location: SuratRekodSuratMasuk.php?error=Failed+to+delete+record");
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Redirect with an error if the statement couldn't be prepared
        header("Location: SuratRekodSuratMasuk.php?error=Failed+to+prepare+statement");
        exit();
    }
} else {
    // Redirect back if no ID is provided
    header("Location: SuratRekodSuratMasuk.php?error=No+ID+provided");
    exit();
}
?>