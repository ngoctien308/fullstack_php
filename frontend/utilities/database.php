<?php

class Database {
    private $connect;
    public function __construct() {
        $this->connect = new mysqli('localhost:3307', 'root', '', 'testmvc');
        if ($this->connect->connect_error) {
            die("Failed database connection: " . $this->conn->connect_error);
        }
    }

    public function getConnect() {
        return $this->connect;
    }
}