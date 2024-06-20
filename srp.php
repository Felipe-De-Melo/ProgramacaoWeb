<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA 
* Disciplina de Programação Web 
* Dev: Felipe Fernandes - 2120954 
* Data: 18/06/2024

## Seguindo o princípio da responsabilidade (SRP) apenas uma mudança deve ser atribuída a cada classe.
*/ 

class Usuario {
    public $id;
    public $nome;
    public $email;
    public $senha;

    public function __construct($id, $nome, $email, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }
}

class RepositorioUsuario {
    private $usuarios = [];

    public function save(Usuario $usuario) {
        // Simulando salvamento no banco de dados
        $this->usuarios[] = $usuario;
    }

    public function getAllUsers() {
        // Simulando busca no banco de dados
        return $this->usuarios;
    }
}

class ServicoEmail {
    public function enviarEmailBoasVindas(Usuario $usuario) {
        // comando usado para enviar ao usuário um email de boas vindas
        echo "Email de boas-vindas enviado para: {$usuario->email}\n";
    }
}

class ExportarCSV {
    public function exportToCSV(array $usuarios) {
        $csv = "id,nome,email\n";
        foreach ($usuarios as $usuario) {
            $csv .= "{$usuario->id},{$usuario->nome},{$usuario->email}\n";
        }
        file_put_contents('usuarios.csv', $csv);
    }
}

// Urilização do algoritmo
$usuario = new Usuario(1, 'John Doe', 'john@example.com', 'secret');
$repositorioUsuario = new RepositorioUsuario();
$servicoEmail = new ServicoEmail();
$exportarCSV = new ExportarCSV();

$repositorioUsuario->save($usuario);
$servicoEmail->enviarEmailBoasVindas($usuario);
$usuarios = $repositorioUsuario->getAllUsers();
$exportarCSV->exportToCSV($usuarios);
?>
