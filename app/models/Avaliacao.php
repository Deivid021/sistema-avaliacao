<?php
    require_once __DIR__ . '/../../config/Conexao.php';

    class Avaliacao {
        public static function salvarAvaliacao($dados, $feedback = null) {
            $con = Conexao::getConexao();
            $sql = "INSERT INTO avaliacao (id_pergunta, id_dispositivo, resposta, feedback)
                    VALUES (:id_pergunta, :id_dispositivo, :resposta, :feedback);";
            $stmt = $con->prepare($sql);
            
            foreach($dados as $valor) {
                $stmt->execute([
                    ':id_pergunta' => $valor['id_pergunta'],
                    ':id_dispositivo' => 1,
                    ':resposta' => $valor['resposta'],
                    ':feedback' => $feedback
                ]);
            }
        }
    }
?>