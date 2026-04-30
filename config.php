<?php
// Configurações do banco de dados
$host = 'localhost';
$db   = '3b_lojavirtual';
$user = 'root';
$pass = ''; // No XAMPP a senha padrão é vazia
$charset = 'utf8mb4';

// Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opções do PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Cria a conexão
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Caso ocorra erro na conexão, exibe a mensagem
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
?>