<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Minha Loja Virtual</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Minha Loja Virtual</h1>

    <p>
        <?php
            echo "Bem-vindo à nossa loja!";
        ?>
    </p>

    <p>
    Acesso realizado às:
    <?php echo date("H:i:s"); ?>
</p>


<form method="get">
    <input type="text" name="nome">
    <button type="submit">Entrar</button>
</form>

<?php
    if (isset($_GET["nome"])) {
        echo "Olá, " . $_GET["nome"] . "! Seja bem-vindo!";
    }
?>
<a href="admin/produtos/cadastrar.php">Cadastrar Produto</a>
<?php
$contador = 1;
while ($contador <= 5) {
    echo "contagem" . $contador . "</p>";
    $contador++;
}
?>
<?php
for ($i = 1; $i <= 5; $i++) {
    echo "contagem for: " . $i . "</p>";
}
?>
<?php
$frutas=array("maçã", "banana", "laranja");{
    echo $frutas [0]. "<br>";
    echo $frutas [1]. "<br>";
}
$produto = array(
    "nome" => "Camiseta",
    "preco" => 29.99,
    "descricao" => "Camiseta de algodão"
);
$produto["preco"] = 24.99; // Atualizando o preço do produto    
echo "Nome: " . $produto["nome"] . "<br>";
echo "Preço: R$ " . number_format($produto["preco"], 2, ',', '.') . "<br>";


$produtos = [
    [
        "id" => 1,
        "nome" => "teclado mecanico",
        "preco" => 250.99,
        "estoque" => 10
    ],
    [
        "id" => 2,
        "nome" => "mouse gamer",
        "preco" => 200.99,
        "estoque" => 5
    ]
    
    ];
    echo $produtos[0]["nome"] . " - R$ " . number_format($produtos[0]["preco"], 2, ',', '.') . "<br>";
    echo $produtos[1]["nome"] . " - R$ " . number_format($produtos[1]["preco"], 2, ',', '.') . "<br>";
?>
</body>
</html>