<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Jogo</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="card">
        <h2>Adicionar Novo Jogo</h2>
        <form method="POST" action="processar_adicao.php">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="data_criacao">Data de Criação:</label>
            <input type="date" name="data_criacao" id="data_criacao" required>

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" maxlength="100" required>

            <label for="estilo_jogo">Estilo de Jogo:</label>
            <input type="text" name="estilo_jogo" id="estilo_jogo" required>

            <label for="indicacao_idade">Indicação de Idade:</label>
            <input type="text" name="indicacao_idade" id="indicacao_idade" required>

            <button type="submit">Adicionar Jogo</button>
        </form>
    </div>
</body>
</html>
