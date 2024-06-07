<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA
* Disciplina de Programação Web
* Dev: Felipe Fernandes - 2120954
* DATA: 06/06/2024
*/
// Configuração da conexão com o banco de dados.
$host = 'localhost';
$db = 'ecommerce';
$user = 'root';
$pass = '';

// Criando a conexão.
try {
    // Criando uma nova instância de PDO para se conectar ao banco de dados.
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Configurando o PDO para lançar algumas exceções em caso de erros.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se ocorrer um erro, será exibida a mensagem e o script será encerrado.
    die("Não foi possível conectar ao banco de dados: " . $e->getMessage());
}
?>
