<?php
// 1. Inclui o arquivo de conexão
require_once "../../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 2. Recebe os dados do formulário
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];

    // 3. Prepara o comando SQL (usando prepared statements para segurança)
    $sql = "INSERT INTO produtos (nome, preco, descricao) VALUES (:nome, :preco, :descricao)";
    $stmt = $pdo->prepare($sql);

    // 4. Executa o comando passando os valores
    try {
        $stmt->execute([
            ':nome' => $nome,
            ':preco' => $preco,
            ':descricao' => $descricao
        ]);
        $mensagem = "Produto cadastrado com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao cadastrar produto: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Cadastro</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $mensagem; ?></h1>
        <p><a href="cadastrar.php">Cadastrar outro produto</a></p>
        <p><a href="listar.php">Ver lista de produtos</a></p>
    </div>
</body>
</html>