<?php
$nomeBanco = __DIR__ . '/meu_banco.db';

function inicializarBanco() {
    global $nomeBanco;
    $db = new SQLite3($nomeBanco);

    $query = "CREATE TABLE IF NOT EXISTS usuarios (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT NOT NULL,
                email TEXT NOT NULL UNIQUE,
                senha TEXT NOT NULL
              )";

    $tabelaJogos = "CREATE TABLE IF NOT EXISTS jogos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        data_criacao DATE NOT NULL,
        descricao TEXT NOT NULL CHECK (LENGTH(descricao) <= 100),
        estilo_jogo TEXT NOT NULL,
        indicacao_idade TEXT NOT NULL
    )";

    $db->exec($query);
    $db->exec($tabelaJogos);

    $usuarios = [
        ["João Silva", "joao.silva@example.com", password_hash("senha123", PASSWORD_DEFAULT)],
        ["Maria Oliveira", "maria.oliveira@example.com", password_hash("senha456", PASSWORD_DEFAULT)],
        ["Pedro Santos", "pedro.santos@example.com", password_hash("senha789", PASSWORD_DEFAULT)]
    ];

    $insertQuery = "INSERT OR IGNORE INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $db->prepare($insertQuery);

    foreach ($usuarios as $usuario) {
        $stmt->bindValue(':nome', $usuario[0], SQLITE3_TEXT);
        $stmt->bindValue(':email', $usuario[1], SQLITE3_TEXT);
        $stmt->bindValue(':senha', $usuario[2], SQLITE3_TEXT);
        $stmt->execute();
    }

    $db->close();
}

function buscarJogos() {
    global $nomeBanco;
    $db = new SQLite3($nomeBanco);
    $query = "SELECT * FROM jogos";
    $result = $db->query($query);

    $jogos = [];
    while ($jogo = $result->fetchArray(SQLITE3_ASSOC)) {
        $jogos[] = $jogo;
    }

    $db->close();
    return $jogos;
}

function buscarJogoPorId($id) {
    global $nomeBanco;
    $db = new SQLite3($nomeBanco);

    $query = "SELECT * FROM jogos WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();

    $jogo = $result->fetchArray(SQLITE3_ASSOC);

    $db->close();
    return $jogo;
}

function adicionarJogo($nome, $data_criacao, $descricao, $estilo_jogo, $indicacao_idade) {
    global $nomeBanco;
    $db = new SQLite3($nomeBanco);
    $query = "INSERT INTO jogos (nome, data_criacao, descricao, estilo_jogo, indicacao_idade) VALUES (:nome, :data_criacao, :descricao, :estilo_jogo, :indicacao_idade)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
    $stmt->bindValue(':data_criacao', $data_criacao, SQLITE3_TEXT);
    $stmt->bindValue(':descricao', $descricao, SQLITE3_TEXT);
    $stmt->bindValue(':estilo_jogo', $estilo_jogo, SQLITE3_TEXT);
    $stmt->bindValue(':indicacao_idade', $indicacao_idade, SQLITE3_TEXT);
    $stmt->execute();
    $db->close();
}

function excluirJogo($id) {

    global $nomeBanco;
    $db = new SQLite3($nomeBanco);
    
    $query = "DELETE FROM jogos WHERE id = :id";

    $stmt = $db->prepare($query);

    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

    $stmt->execute();
} 

function atualizarJogo($id, $nome, $data_criacao, $descricao, $estilo_jogo, $indicacao_idade) {
    global $nomeBanco;
    $db = new SQLite3($nomeBanco);
    $query = "UPDATE jogos SET nome = :nome, data_criacao = :data_criacao, descricao = :descricao, estilo_jogo = :estilo_jogo, indicacao_idade = :indicacao_idade WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
    $stmt->bindValue(':data_criacao', $data_criacao, SQLITE3_TEXT);
    $stmt->bindValue(':descricao', $descricao, SQLITE3_TEXT);
    $stmt->bindValue(':estilo_jogo', $estilo_jogo, SQLITE3_TEXT);
    $stmt->bindValue(':indicacao_idade', $indicacao_idade, SQLITE3_TEXT);
    $stmt->execute();
    $db->close();
}
inicializarBanco();
?>
