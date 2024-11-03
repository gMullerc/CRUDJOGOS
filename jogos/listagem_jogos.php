<?php
require '../sql_dao.php';

$jogos = buscarJogos();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Jogos</title>
    <link rel="stylesheet" href="listagem_jogos.css"> <!-- Inclua aqui -->
</head>
<body>
    <div class="card">
        <h2>Listagem de Jogos</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Criação</th>
                    <th>Descrição</th>
                    <th>Estilo de Jogo</th>
                    <th>Indicação de Idade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Exibe os jogos na tabela
                foreach ($jogos as $jogo) {
                    echo "<tr>
                            <td>" . htmlspecialchars($jogo['nome']) . "</td>
                            <td>" . htmlspecialchars($jogo['data_criacao']) . "</td>
                            <td>" . htmlspecialchars($jogo['descricao']) . "</td>
                            <td>" . htmlspecialchars($jogo['estilo_jogo']) . "</td>
                            <td>" . htmlspecialchars($jogo['indicacao_idade']) . "</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
        <div style="text-align: center; margin-top: 20px;">
            <a href="adicionar_jogo.php" class="button">Adicionar Novo Jogo</a>
        </div>
    </div>
</body>
</html>
