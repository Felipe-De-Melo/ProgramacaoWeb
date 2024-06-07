<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/

// Classe que para representar um produto.
    public $id;
    public $name;
    public $description;
    public $price;
    
    // Criando um construtor para inicializar as propriedades da classe
    public function __construct($id, $name, $description, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}
?>
