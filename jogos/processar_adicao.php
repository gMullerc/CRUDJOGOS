<?php
require __DIR__ . '/../sql_dao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'];
    $data_criacao = $_POST['data_criacao'];
    $descricao = $_POST['descricao'];
    $estilo_jogo = $_POST['estilo_jogo'];
    $indicacao_idade = $_POST['indicacao_idade'];

    if ($id) {
        atualizarJogo($id, $nome, $data_criacao, $descricao, $estilo_jogo, $indicacao_idade);
    } else {
        adicionarJogo($nome, $data_criacao, $descricao, $estilo_jogo, $indicacao_idade);
    }

    header("Location: listagem_jogos.php");
    exit();
}
?>
