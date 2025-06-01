<?php
require_once '../../models/ProductModel.php';
require_once '../../db.php';

$productModel = new ProductModel($conn);

header('Content-Type: application/json');

try {
    if (isset($_GET['id'])) {
        echo json_encode($productModel->getById($_GET['id']));
    } else {
        echo json_encode($productModel->getAll());
    }
} catch (\Throwable $th) {
    http_response_code(400);
    echo json_encode(["status" => false, "message" => $th->getMessage()]);
}