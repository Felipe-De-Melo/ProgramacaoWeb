<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA 
* Disciplina de Programação Web 
* Dev: Felipe Fernandes - 2120954 
* Data: 18/06/2024

## O princípio da segregação de interfaces (ISP) permite que uma classe não faça a implementação de interfaces sem necessidades de uso, 
## melhorando o desempenho da aplicação.

*/ 

interface InterfaceServicoEmail {
    public function sendWelcomeEmail(Usuario $usuario);
}

class ServicoEmail implements InterfaceServicoEmail {
    public function sendWelcomeEmail(Usuario $usuario) {
        // Enviar o email de boas vindas para o usuário.
        echo "Email de boas-vindas enviado para " . $usuario->getNome();
    }
}

class Usuario {
    private $nome;
    
    public function __construct($nome) {
        $this->nome = $nome;
    }
    
    public function getNome() {
        return $nome;
    }
}

// Instanciar um objeto Usuario
$usuario = new Usuario("Felipe Fernandes");

// Em uso
$servicoemail = new ServicoEmail();
$servicoemail->sendWelcomeEmail($usuario);

?>
