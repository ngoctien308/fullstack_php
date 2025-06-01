<?php
require_once '../../models/ProductModel.php';
require_once '../../db.php';

$productModel = new ProductModel($conn);


header('Content-Type: application/json');

try {
    if (!isset($_GET['id'])) {
        throw new Exception("Thiếu dữ liệu");
    }

    if ($productModel->getById($_GET['id']) == []) {
        throw new Exception("Không tìm thấy product với id là " . $_GET['id']);
    }

    $productModel->delete($_GET['id']);
    echo json_encode(["status" => true, "message" => "Xóa thành công."]);
} catch (\Throwable $th) {
    http_response_code(400);
    echo json_encode(["status" => false, "message" => $th->getMessage()]);
}


