<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/

require_once 'src/services/OrderService.php';

class OrderController {
    private $orderService;

    // Construtor que inicializa o OrderService.
    public function __construct($pdo) {
        $this->orderService = new OrderService($pdo);
    }

    // Método para criar uma nova ordem.
    public function createOrder() {
        $userId = $_POST['user_id'];
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $this->orderService->createOrder($userId, $productId, $quantity);
        header('Location: /orders');
    }
}
?>
