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

        public static function inserirPergunta($texto, $status = 1) {
            $con = Conexao::getConexao();
            $sql = "INSERT INTO pergunta (texto, status) VALUES (:texto, :status);";
            $stmt = $con->prepare($sql);
            $stmt->execute([':texto' => $texto,
                            ':status' => $status]);
        }
    }

    // $init = Pergunta::listarPergunta();
    // foreach ($init as $valor) {
    //     echo "ID: {$valor['id']} - Texto: {$valor['texto']} - Status: {$valor['status']}<br>";
    // }
    
?>