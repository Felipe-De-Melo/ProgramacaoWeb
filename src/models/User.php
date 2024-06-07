<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/
// Classe representando um usuário.
class User {
    public $id;
    public $username;
    public $email;
    public $password;
    
    // Criando um construtor para inicializar as propriedades da classe
    public function __construct($id, $username, $email, $password) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
}
?>
