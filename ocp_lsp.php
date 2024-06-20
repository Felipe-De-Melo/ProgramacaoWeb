<?php
/*
* Curso de Engenharia de Software - UniEVANGÉLICA 
* Disciplina de Programação Web 
* Dev: Felipe Fernandes - 2120954 
* Data: 18/06/2024

## O princípio aberto/fechado defende a construção de uma entidade que nunca precise ser alterada.
## Você é capaz de adicionar qualquer quantidade de novas funcionalidades a esta entidade não consegue modificar seu comportamento preexistente.
## Também aplicando o princípio da substuição de Liskov (LSP) os objetos de uma classe filha pode substituir dados dentro de uma classe pai sem
## alterar o andamento do código.
*/ 

interface Exportar {
    public function export(array $data);
}

class ExportarCSV implements Exportar {
    public function export(array $usuarios) {
        $csv = "id,nome,email\n";
        foreach ($usuarios as $usuario) {
            $csv .= "{$usuario->id},{$usuario->nome},{$usuario->email}\n";
        }
        file_put_contents('usuarios.csv', $csv);
    }
}

class ExportarJSON implements Exportar {
    public function export(array $usuarios) {
        $jsonArray = array_map(function($usuario) {
            return [
                'id' => $usuario->id,
                'nome' => $usuario->nome,
                'email' => $usuario->email
            ];
        }, $usuarios);
        file_put_contents('usuarios.json', json_encode($jsonArray));
    }
}

// Definindo a variável $usuarios como um exemplo
$usuarios = [
    (object) ['id' => 1, 'nome' => 'João', 'email' => 'joao@example.com'],
    (object) ['id' => 2, 'nome' => 'Maria', 'email' => 'maria@example.com'],
    (object) ['id' => 3, 'nome' => 'Pedro', 'email' => 'pedro@example.com']
];

// Utilização do princípio 
$exportarCSV = new ExportarCSV();
$exportarJSON = new ExportarJSON();

$exportarCSV->export($usuarios);
$exportarJSON->export($usuarios);
?>
