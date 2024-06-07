<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/

require_once 'src/repositories/UserRepository.php';
require_once 'src/database/connection.php';

class UserService {
    private $userRepository;

    // Construtor para inicializar o UserRepository.
    public function __construct($pdo) {
        $this->userRepository = new UserRepository($pdo);
    }

    // Método para registrar um novo usuário dentro do sistema.
    public function register($username, $email, $password) {
        // Esse bloco faz a criptografia das senhas antes de fazer o seu salvamento.
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User(null, $username, $email, $hashedPassword);
        $this->userRepository->save($user);
    }

    // Método para realizar o login de um usuário
    public function login($email, $password) {
        $user = $this->userRepository->findByEmail($email);
        // Verificação da senha
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }
}
?>
