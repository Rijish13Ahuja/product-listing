<?php
include 'db.php';

// $limit = 12;
// $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// $offset = ($page - 1) * $limit;

// $category = isset($_GET['category']) ? $_GET['category'] : '';
// $min_price = isset($_GET['min_price']) ? $_GET['min_price'] : 0;
// $max_price = isset($_GET['max_price']) ? $_GET['max_price'] : 9999;
// $sale_status = isset($_GET['sale_status']) ? $_GET['sale_status'] : '';

//$query = "SELECT * FROM products WHERE price BETWEEN :min_price AND :max_price";
$query = "SELECT * FROM products";


// $params = [':min_price' => $min_price, ':max_price' => $max_price];

// if ($category) {
//     $query .= " AND category = :category";
//     $params[':category'] = $category;
// }

// if ($sale_status) {
//     $query .= " AND sale_status = :sale_status";
//     $params[':sale_status'] = $sale_status;
// }

// //$query .= " LIMIT :limit OFFSET :offset";
// $params[':limit'] = $limit;
// $params[':offset'] = $offset;

$stmt = $pdo->prepare($query);
//$stmt->execute($params);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $totalQuery = "SELECT COUNT(*) FROM products WHERE price BETWEEN :min_price AND :max_price";
// $totalStmt = $pdo->prepare($totalQuery);
// $totalStmt->execute([':min_price' => $min_price, ':max_price' => $max_price]);
// $totalProducts = $totalStmt->fetchColumn();
// $totalPages = ceil($totalProducts / $limit);
