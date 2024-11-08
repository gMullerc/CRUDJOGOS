<?php
require __DIR__ . '/../sql_dao.php';

$id = null;
$nome = '';
$data_criacao = '';
$descricao = '';
$estilo_jogo = '';
$indicacao_idade = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $jogo = buscarJogoPorId($id);

    if ($jogo) {
        $nome = $jogo['nome'];
        $data_criacao = $jogo['data_criacao'];
        $descricao = $jogo['descricao'];
        $estilo_jogo = $jogo['estilo_jogo'];
        $indicacao_idade = $jogo['indicacao_idade'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?php echo $id ? 'Editar Jogo' : 'Adicionar Jogo'; ?></title>
    <link rel="stylesheet" href="adicionar_jogo.css">
</head>
<body>
    <div class="card"> 
        <h2><?php echo $id ? 'Editar Jogo' : 'Adicionar Novo Jogo'; ?></h2>
        <form method="POST" action="processar_adicao.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($nome); ?>" required>

            <label for="data_criacao">Data de Criação:</label>
            <input type="date" name="data_criacao" id="data_criacao" value="<?php echo htmlspecialchars($data_criacao); ?>" required>

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="<?php echo htmlspecialchars($descricao); ?>" maxlength="100" required>

            <label for="estilo_jogo">Estilo de Jogo:</label>
            <input type="text" name="estilo_jogo" id="estilo_jogo" value="<?php echo htmlspecialchars($estilo_jogo); ?>" required>

            <label for="indicacao_idade">Indicação de Idade:</label>
            <input type="text" name="indicacao_idade" id="indicacao_idade" value="<?php echo htmlspecialchars($indicacao_idade); ?>" required>

            <button type="submit"><?php echo $id ? 'Salvar Alterações' : 'Adicionar Jogo'; ?></button>
            <a href="listagem_jogos.php" class="button">Voltar para Listagem</a>
        </form>
    </div>
</body>
</html>
