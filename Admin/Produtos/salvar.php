<html>
    <head>
        <title>
            Produto Salvo
        </title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
        <h1 id="sucesso">Produto salvo com sucesso</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $preco = $_POST["preco"];
            $descricao = $_POST["descricao"];

            // Aqui você pode adicionar o código para salvar os dados do produto em um banco de dados ou arquivo

           echo "<p>Nome: " . htmlspecialchars($nome) . "</p>";
            echo "<p>Preço: R$ " . number_format($preco, 2, ',', '.') . "</p>";
            echo "<p>Descrição: " . nl2br(htmlspecialchars($descricao)) . "</p>";
        }
        ?>
        </div>
    </body>
</html>