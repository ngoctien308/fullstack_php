<?php

require_once 'utilities/bootstrap.php';

// default: controller: product, action: index
$controllerName = ucfirst($_GET['controller'] ?? 'product') . 'Controller';
$actionName = $_GET['action'] ?? 'index';

require "./controllers/${controllerName}.php";

// Initiate
$controllerObject = new $controllerName;
$controllerObject->$actionName();

