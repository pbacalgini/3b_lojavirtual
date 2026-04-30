<?php
require_once "../../config.php";
try {
    $sql = "SELECT * FROM produtos ORDER BY nome ASC";
    $stmt = $pdo->query($sql);
    $produtos = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erro ao buscar produtos: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos - Admin</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #333; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .btn-novo { display: inline-block; padding: 10px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <fieldset>
    <legend>Filtros de Busca</legend>
    <form method="GET" action="listar.php">
        <input type="text" name="busca" placeholder="Digite o nome do produto..." value="<?php echo $_GET['busca'] ?? ''; ?>">
        
        <select name="preco_max">
            <option value="">Preço até...</option>
            <option value="50" <?php echo (isset($_GET['preco_max']) && $_GET['preco_max'] == '50') ? 'selected' : ''; ?>>Até R$ 50,00</option>
            <option value="100" <?php echo (isset($_GET['preco_max']) && $_GET['preco_max'] == '100') ? 'selected' : ''; ?>>Até R$ 100,00</option>
            <option value="500" <?php echo (isset($_GET['preco_max']) && $_GET['preco_max'] == '500') ? 'selected' : ''; ?>>Até R$ 500,00</option>
        </select>

        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Filtrar</button>
        <a href="listar.php" class="btn-limpar">Limpar Filtros</a>
    </form>
</fieldset>
<?php
require_once '../../config.php';

// 1. Pegar os dados do formulário (se existirem)
$busca = $_GET['busca'] ?? '';
$preco_max = $_GET['preco_max'] ?? '';

// 2. Base da consulta SQL
$sql = "SELECT id, nome, preco, quantidade FROM produtos WHERE 1=1";
$params = [];

// 3. Adicionar filtros dinamicamente
if (!empty($busca)) {
    $sql .= " AND nome LIKE :busca";
    $params[':busca'] = "%$busca%";
}

if (!empty($preco_max)) {
    $sql .= " AND preco <= :preco_max";
    $params[':preco_max'] = $preco_max;
}

$sql .= " ORDER BY nome ASC";

// 4. Preparar e executar
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="container">
        <h1>Gerenciar Produtos</h1>
        
        <a href="cadastrar.php" class="btn-novo">+ Cadastrar Novo Produto</a>

        <?php if (count($produtos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($produtos as $p): ?>
    <tr>
        <td><?php echo $p['id']; ?></td>
        <td><?php echo htmlspecialchars($p['nome']); ?></td>
        <td>R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></td>
        <td><?php echo $p['quantidade']; ?></td>
        <td>
            <!-- Link para Editar -->
            <a href="editar.php?id=<?php echo $p['id']; ?>" title="Editar">
                <i class="fa-solid fa-pen-to-square"></i>
            </a> 
            
            <!-- Link para Excluir com Confirmação -->
            <a href="excluir.php?id=<?php echo $p['id']; ?>" 
               onclick="return confirm('Tem certeza que deseja excluir este produto?')" 
               title="Excluir" 
               style="color: red; margin-left: 10px;">
                <i class="fa-solid fa-trash"></i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum produto encontrado no banco de dados.</p>
        <?php endif; ?>
    </div>
</body>
</html>
