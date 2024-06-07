<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/

require_once 'src/models/Order.php';
require_once 'src/database/connection.php';

class OrderRepository {
    private $pdo;

    // Construtor que recebe uma instância de PDO para acessar o banco de dados.
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para salvar uma nova ordem no banco de dados.
    public function save(Order $order) {
        $stmt = $this->pdo->prepare("INSERT INTO orders (user_id, product_id, quantity, total) VALUES (?, ?, ?, ?)");
        $stmt->execute([$order->user_id, $order->product_id, $order->quantity, $order->total]);
        $order->id = $this->pdo->lastInsertId();
    }
}
?>
