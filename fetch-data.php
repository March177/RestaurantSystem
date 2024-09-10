<?php
// fetch_data.php

// Include the configuration file to connect to the database
include 'db/config.php';

// Fetch unique values for filters
function fetchDistinctValues($column) {
    global $conn;
    $query = "SELECT DISTINCT $column FROM menu";
    return mysqli_query($conn, $query);
}

$menuResult = fetchDistinctValues('menu_name');
$categoryResult = fetchDistinctValues('category');
$subcategoryResult = fetchDistinctValues('subcategory');
$priceResult = fetchDistinctValues('price');

// Handle filtering
function getFilterConditions() {
    global $conn;
    $whereClauses = [];
    if (isset($_GET['menu_name']) && !empty($_GET['menu_name'])) {
        $menuName = mysqli_real_escape_string($conn, $_GET['menu_name']);
        $whereClauses[] = "menu_name = '$menuName'";
    }
    if (isset($_GET['category']) && !empty($_GET['category'])) {
        $category = mysqli_real_escape_string($conn, $_GET['category']);
        $whereClauses[] = "category = '$category'";
    }
    if (isset($_GET['subcategory']) && !empty($_GET['subcategory'])) {
        $subcategory = mysqli_real_escape_string($conn, $_GET['subcategory']);
        $whereClauses[] = "subcategory = '$subcategory'";
    }
    if (isset($_GET['price']) && !empty($_GET['price'])) {
        $price = mysqli_real_escape_string($conn, $_GET['price']);
        $whereClauses[] = "price = '$price'";
    }

    return $whereClauses;
}

function fetchFilteredMenuData($whereClauses) {
    global $conn;
    $whereClause = '';
    if (count($whereClauses) > 0) {
        $whereClause = 'WHERE ' . implode(' AND ', $whereClauses);
    }
    $query = "SELECT * FROM menu $whereClause";
    return mysqli_query($conn, $query);
}

$whereClauses = getFilterConditions();
$rows = fetchFilteredMenuData($whereClauses);

if (!$rows) {
    die("Query failed: " . mysqli_error($conn));
}


?>


