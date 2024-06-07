<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/

// Inclui o arquivo 'OrderRepository.php' do diretório 'src/repositories'.
require_once 'src/repositories/OrderRepository.php';

// Inclui o arquivo 'connection.php' do diretório 'src/database'.
require_once 'src/database/connection.php';

// Define a classe OrderService.
class OrderService {
    // Declara uma variável privada para armazenar uma instância do repositório de pedidos.
    private $orderRepository;

    // Construtor da classe OrderService
    public function __construct($pdo) {
        // Cria uma nova instância do repositório de pedidos.
        // O objeto PDO passado como argumento é usado para interagir com o banco de dados.
        $this->orderRepository = new OrderRepository($pdo);
    }

    // Método para realizar um pedido.
    public function placeOrder($userId, $productId, $quantity, $total) {
        // Cria uma nova instância de Pedido.
        $order = new Order(null, $userId, $productId, $quantity, $total, null);
        // Salva o pedido no repositório de pedidos.
        $this->orderRepository->save($order);
    }
}
?>

