<?php
class ProductModel
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getAll()
    {
        $productsQuery = $this->db->query("SELECT * FROM products");
        if ($productsQuery->num_rows > 0) {
            return $productsQuery->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function getById($id)
    {
        $productQuery = $this->db->query("SELECT * FROM products where id = " . $id);
        if ($productQuery->num_rows > 0) {
            return $productQuery->fetch_assoc();
        }
        return [];
    }

    public function create($data)
    {

        $preparedStatement = $this->db->prepare("INSERT INTO products (name, quantity, description) VALUES (?,?,?)");
        $preparedStatement->bind_param("sss", $data['name'], $data['quantity'], $data['description']);
        $preparedStatement->execute();
    }

    public function update($id, $updatedData)
    {
        $product = $this->db->query("select * from products where id = " . $id)->fetch_assoc();

        if (!isset($updatedData['name'])) {
            $updatedData['name'] = $product['name'];
        }

        if (!isset($updatedData['quantity'])) {
            $updatedData['quantity'] = $product['quantity'];
        }

        if (!isset($updatedData['description'])) {
            $updatedData['description'] = $product['description'];
        }

        $preparedStatement = $this->db->prepare("update products set name=?,quantity=?,description=? where id=?");
        $preparedStatement->bind_param("ssss", $updatedData['name'], $updatedData['quantity'], $updatedData['description'], $id);
        $preparedStatement->execute();
    }

    public function delete($id)
    {
        $this->db->query("delete from products where id = " . $id);
    }
}
