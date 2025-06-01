<?php
include 'models/ProductModel.php';

class ProductController
{
    const basePath = 'views/products';
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $products = $this->productModel->getAll();
        include self::basePath . '/index.php';
    }

    public function add()
    {
        $this->productModel->create($_POST['name'], $_POST['description'], $_POST['quantity']);
        header('Location: http://localhost/fullstack_php/frontend/index.php');
    }

    public function show()
    {
        $product = $this->productModel->getById($_GET['productId']);
        include self::basePath . '/show.php';
    }

    public function delete()
    {
        $this->productModel->deleteById($_GET['productId']);
        header('Location: http://localhost/fullstack_php/frontend/index.php');
    }
}