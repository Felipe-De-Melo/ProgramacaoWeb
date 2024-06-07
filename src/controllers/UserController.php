<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/

require_once 'src/services/UserService.php';

class UserController {
    private $userService;

    // Construtor que inicializa o UserService.
    public function __construct($pdo) {
        $this->userService = new UserService($pdo);
    }

    // Método para mostrar a página de registro.
    public function showRegister() {
        include 'views/register.php';
    }

    // Método para processar o registro de um novo usuário.
    public function register() {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $this->userService->register($username, $email, $password);
        header('Location: /login');
    }

    // Método para mostrar a página de login.
    public function showLogin() {
        include 'views/login.php';
    }

    // Método para processar o login de um usuário.
    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->userService->login($email, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: /products');
        } else {
            echo "Login falhou!";
        }
    }
}
?>