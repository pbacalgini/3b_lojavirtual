<?php
require_once "../../config.php";

// 1. Verificar se o ID foi passado via URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        // 2. Preparar e executar o comando de exclusão
        $sql = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // 3. Redirecionar de volta para a listagem
        header("Location: listar.php?msg=sucesso_delete");
        exit;

    } catch (PDOException $e) {
        die("Erro ao excluir produto: " . $e->getMessage());
    }
} else {
    header("Location: listar.php");
    exit;
}
?>