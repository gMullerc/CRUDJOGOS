<?php 
require __DIR__ . '/../sql_dao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
 
    excluirJogo($id);
 
    header("Location: listagem_jogos.php");
    exit();
} else {
    echo "ID não encontrado!";
}
?>