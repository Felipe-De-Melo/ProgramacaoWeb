<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/
// Classe para fazer a representação uma ordem de compra.
class Order {
    public $id;
    public $user_id;
    public $product_id;
    public $quantity;
    public $total;
    public $created_at;
    
    // Criação de um construtor para inicializar as propriedades da classe.
    public function __construct($id, $user_id, $product_id, $quantity, $total, $created_at) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->total = $total;
        $this->created_at = $created_at;
    }
}
?>
