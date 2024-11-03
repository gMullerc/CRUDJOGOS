<?php
require '../sql_dao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data_criacao = $_POST['data_criacao'];
    $descricao = $_POST['descricao'];
    $estilo_jogo = $_POST['estilo_jogo'];
    $indicacao_idade = $_POST['indicacao_idade'];

    adicionarJogo($nome, $data_criacao, $descricao, $estilo_jogo, $indicacao_idade);

    header("Location: listagem_jogos.php");
    exit();
}
?>
