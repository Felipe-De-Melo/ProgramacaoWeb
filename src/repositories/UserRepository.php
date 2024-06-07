<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/

require_once 'src/models/User.php';
require_once 'src/database/connection.php';

class UserRepository {
    private $pdo;

    // Esse construtor recebe uma instância de PDO para acessar o banco de dados.
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método utilizado para encontrar um usuário filtrando a busca por um email cadastrado.
    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        if ($row) {
            return new User($row['id'], $row['username'], $row['email'], $row['password']);
        }
        return null;
    }

    // Esse bloco contém um métoedo para salvar um novo usuário dentro do banco de dados.
    public function save(User $user) {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$user->username, $user->email, $user->password]);
        $user->id = $this->pdo->lastInsertId();
    }
}
?>
