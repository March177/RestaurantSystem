<?php
include 'db/config.php';

function deleteProduct($id) {
    global $conn;

    // Prepare the SQL statement
    $stmt = $conn->prepare("DELETE FROM menu WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement and check if successful
    if ($stmt->execute()) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
    $conn->close();
}

// Check if an ID is passed for deletion
if (isset($_POST['id'])) {
    deleteProduct($_POST['id']);
}
?>
