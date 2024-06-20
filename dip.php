<?php 
/*
* Curso de Engenharia de Software - UniEVANGÉLICA 
* Disciplina de Programação Web 
* Dev: Felipe Fernandes - 2120954 
* Data: 18/06/2024

## Princípio da inversão de dependência garante que os módulos de um nível superior não dependam de um módulo de nível inferior.
## Sendo assim os dois necessitam apenas de abstrações.

*/ 

interface InterfaceRepositorioUsuario {
    public function save(Usuario $usuario);
    public function getAllUsers();
}

class RepositorioUsuario implements InterfaceRepositorioUsuario {
    private $usuarios = [];

    public function save(Usuario $usuario) {
        $this->usuarios[] = $usuario;
        // Função para salvar um usuário dentro do banco de dados
    }

    public function getAllUsers() {
        return $this->usuarios;
        // Pegando todos os usuários inseridos dentro do banco de dados
    }
}

interface InterfaceServicoEmail {
    public function sendWelcomeEmail(Usuario $usuario);
}

class ServicoEmail implements InterfaceServicoEmail {
    public function sendWelcomeEmail(Usuario $usuario) {
        // Função para enviar email de boas-vindas
    }
}

class Usuario {
    private $nome;
    private $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }
}

class ServicoUsuario {
    private $repositorioUsuario;

    public function __construct(InterfaceRepositorioUsuario $repositorioUsuario) {
        $this->repositorioUsuario = $repositorioUsuario;
    }

    public function register(Usuario $usuario, InterfaceServicoEmail $servicoEmail) {
        $this->repositorioUsuario->save($usuario);
        $servicoEmail->sendWelcomeEmail($usuario);
    }
}

class ExportarCsv {
    public function export($usuarios) {
        // Função para exportar usuários para CSV
    }
}

// Utilizando
$repositorioUsuario = new RepositorioUsuario();
$servicoUsuario = new ServicoUsuario($repositorioUsuario);
$servicoEmail = new ServicoEmail();

$usuario = new Usuario("Felipe Fernandes", "felipe@exemplo.com");
$servicoUsuario->register($usuario, $servicoEmail);

$usuarios = $repositorioUsuario->getAllUsers();
$exportarCsv = new ExportarCsv();
$exportarCsv->export($usuarios);

?>
