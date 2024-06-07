<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/

session_start();

// Fazendo a inclusão de arquivos necessários para funcionamento.
require_once 'src/controllers/UserController.php';
require_once 'src/controllers/ProductController.php';
require_once 'src/controllers/OrderController.php';
require_once 'src/database/connection.php';

// Criando as instâncias dos controladores
$userController = new UserController($pdo);
$productController = new ProductController($pdo);
$orderController = new OrderController($pdo);

// Realizando o roteamento básico.
if ($_SERVER['REQUEST_URI'] == '/register') {
    $userController->showRegister();
} elseif ($_SERVER['REQUEST_URI'] == '/register/save') {
    $userController->register();
} elseif ($_SERVER['REQUEST_URI'] == '/login') {
    $userController->showLogin();
} elseif ($_SERVER['REQUEST_URI'] == '/login/auth') {
    $userController->login();
} elseif ($_SERVER['REQUEST_URI'] == '/products') {
    $productController->listProducts();
} elseif ($_SERVER['REQUEST_URI'] == '/order/create') {
    $orderController->createOrder();
} else {
    echo "Página não encontrada.";
}
?>
