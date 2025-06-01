<?php
require_once '../../models/ProductModel.php';
require_once '../../db.php';

$productModel = new ProductModel($conn);

$data = json_decode(file_get_contents("php://input"), true);

header('Content-Type: application/json');

try {
    if (!isset($data['name']) || !isset($data['quantity']) || !isset($data['description'])) {
        throw new Exception("Thiếu dữ liệu");
    }

    if ($data['quantity'] <= 0) {
        throw new Exception("Số lượng phải lớn hơn 0.");
    }

    $productModel->create($data);
    echo json_encode(["status" => true, "message" => "Thêm thành công."]);
} catch (\Throwable $th) {
    http_response_code(400);
    echo json_encode(["status" => false, "message" => $th->getMessage()]);
}


