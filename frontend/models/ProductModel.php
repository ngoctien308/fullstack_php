<?php
require_once 'utilities/database.php';

class ProductModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnect();
    }

    public function create($name, $description, $quantity)
    {
        $payload = json_encode(["name" => $name, "quantity" => $quantity, "description" => $description]);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost/fullstack_php/backend/api/products/create.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ],
            CURLOPT_POSTFIELDS => $payload
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
    }

    public function getAll()
    {
        $response = file_get_contents("http://localhost/fullstack_php/backend/api/products");
        return json_decode($response, true);
    }

    public function getById($id)
    {
        $response = file_get_contents("http://localhost/fullstack_php/backend/api/products?id=" . $id);
        return json_decode($response, true);
    }

    public function deleteById($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost/fullstack_php/backend/api/products/delete.php?id=" . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
    }
}