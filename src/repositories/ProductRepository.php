<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/

require_once 'src/models/Product.php';
require_once 'src/database/connection.php';

class ProductRepository {
    private $pdo;

    // Construtor utilizado para acessar o banco de dados.
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para buscar todos os produtos no banco de dados.
    public function findAll() {
        $stmt = $this->pdo->query("SELECT * FROM products");
        $products = [];
        while ($row = $stmt->fetch()) {
            $products[] = new Product($row['id'], $row['name'], $row['description'], $row['price']);
        }
        return $products;
    }

    // Método utilizado para buscar um produto pelo seu ID.
    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new Product($row['id'], $row['name'], $row['description'], $row['price']);
        }
        return null;
    }
}
?>
