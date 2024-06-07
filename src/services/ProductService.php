<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/

// Inclui o arquivo 'ProductRepository.php' do diretório 'src/repositories'.
require_once 'src/repositories/ProductRepository.php';

// Inclui o arquivo 'connection.php' do diretório 'src/database'.
require_once 'src/database/connection.php';

// Define a classe ProductService.
class ProductService {
    // Declara uma variável privada para armazenar uma instância do repositório de produtos.
    private $productRepository;

    // Construtor da classe ProductService.
    public function __construct($pdo) {
        // Cria uma nova instância do repositório de produtos.
        // O objeto PDO passado como argumento é usado para interagir com o banco de dados.
        $this->productRepository = new ProductRepository($pdo);
    }

    // Método para obter todos os produtos.
    public function getAllProducts() {
        // Retorna todos os produtos encontrados pelo repositório de produtos.
        return $this->productRepository->findAll();
    }

    // Método para obter um produto pelo seu ID.
    public function getProductById($id) {
        // Retorna o produto com o ID especificado encontrado pelo repositório de produtos.
        return $this->productRepository->findById($id);
    }
}
?>
