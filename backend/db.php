<?php
$conn = new mysqli('localhost:3307', 'root', '', 'testmvc');
if ($conn->connect_error) {
    die("Failed database connection: " . $conn->connect_error);
}