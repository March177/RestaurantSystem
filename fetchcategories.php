<?php
// Include the database configuration file
require 'db/config.php';

// Fetch menu data
$query = "SELECT category, code, description, created_by FROM menu";
$result = $conn->query($query);

// Check if there are records
if ($result->num_rows > 0) {
    echo '<table border="1">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Category Code</th>
                    <th>Description</th>
                    <th>Created By</th>
                </tr>
            </thead>
            <tbody>';
    
    // Loop through and output the data
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . htmlspecialchars($row['category']) . '</td>
                <td>' . htmlspecialchars($row['code']) . '</td>
                <td>' . htmlspecialchars($row['description']) . '</td>
                <td>' . htmlspecialchars($row['created_by']) . '</td>
              </tr>';
    }
    
    echo '</tbody></table>';
} else {
    echo 'No records found.';
}

// Close the connection
$conn->close();
?>
