<?php
include 'fetch-data.php';

// Fetch unique values for filters
$menuResult = fetchDistinctValues('menu_name');
$categoryResult = fetchDistinctValues('category');
$subcategoryResult = fetchDistinctValues('subcategory');
$priceResult = fetchDistinctValues('price');

// Handle filtering
$whereClauses = getFilterConditions();
$rows = fetchFilteredMenuData($whereClauses);

if (!$rows) {
    die("Query failed: " . mysqli_error($conn));
}

// Prepare the results
$results = [];
while ($row = mysqli_fetch_assoc($rows)) {
    $results[] = $row;
}

// Return the data in JSON format
header('Content-Type: application/json');
echo json_encode([
    'menu' => $menuResult->fetch_all(MYSQLI_ASSOC),
    'category' => $categoryResult->fetch_all(MYSQLI_ASSOC),
    'subcategory' => $subcategoryResult->fetch_all(MYSQLI_ASSOC),
    'price' => $priceResult->fetch_all(MYSQLI_ASSOC),
    'filtered_data' => $results
]);
?>
