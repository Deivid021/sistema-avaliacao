<?php
    require_once __DIR__ . '/../../config/Conexao.php';

    class Avaliacao {
        public static function salvarAvaliacao($dados) {
            $con = Conexao::getConexao();
            $sql = "INSERT INTO avaliacao (id_pergunta, id_dispositivo, resposta, feedback)
                    VALUES (:id_pergunta, :id_dispositivo, :resposta, :feedback);";
            $stmt = $con->prepare($sql);
            
            foreach($dados['respostas'] as $idPergunta => $valor) {
                $stmt->execute([
                    ':id_pergunta' => $idPergunta,
                    ':id_dispositivo' => 1,
                    ':resposta' => $valor,
                    ':feedback' => $dados['feedback']
                ]);
            }
        }
    }
?>