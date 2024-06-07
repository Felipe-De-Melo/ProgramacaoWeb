<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/

require_once 'src/services/ProductService.php';

class ProductController {
    private $productService;

    // Construtor que inicializa o ProductService.
    public function __construct($pdo) {
        $this->productService = new ProductService($pdo);
    }

    // Método para listar todos os produtos.
    public function listProducts() {
        $products = $this->productService->getAllProducts();
        include 'views/products.php';
    }
}
?>
