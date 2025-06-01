<?php
require_once '../../models/ProductModel.php';
require_once '../../db.php';

$productModel = new ProductModel($conn);

$data = json_decode(file_get_contents("php://input"), true);

header('Content-Type: application/json');

try {
    if (!isset($data) || !isset($_GET['id'])) {
        throw new Exception("Thiếu dữ liệu");
    }

    if ($productModel->getById($_GET['id']) == []) {
        throw new Exception("Không tìm thấy product với id là " . $_GET['id']);
    }

    $productModel->update($_GET['id'], updatedData: $data);
    echo json_encode(["status" => true, "message" => "Sửa thành công."]);
} catch (\Throwable $th) {
    http_response_code(400);
    echo json_encode(["status" => false, "message" => $th->getMessage()]);
}


