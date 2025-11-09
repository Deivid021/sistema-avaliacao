<?php
    require_once __DIR__ . '/../../config/Conexao.php';

    class Pergunta {
        public static function listarPergunta() {
            $con = Conexao::getConexao();
            $sql = 'SELECT id, texto, status FROM pergunta WHERE status = 1 ORDER BY id;';
            $stmt = $con->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    // $init = Pergunta::listarPergunta();
    // foreach ($init as $valor) {
    //     echo "ID: {$valor['id']} - Texto: {$valor['texto']} - Status: {$valor['status']}<br>";
    // }
    
?>