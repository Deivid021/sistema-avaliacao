<?php
    require_once __DIR__ . '/../../config/Conexao.php';

    class Pergunta {
        public static function existeOrdem($ordem, $idIgnorar) {
            $con = Conexao::getConexao();
            $sql = "SELECT id FROM pergunta WHERE ordem = :ordem";

            if ($idIgnorar != null){
                $sql .= "AND id != :idIgnorar";
            }

            $stmt = $con->prepare($sql);
            $params = ['ordem' => $ordem];

            if ($idIgnorar != null) {
                $params['idIgnorar'] = $idIgnorar;
            }

            $stmt->execute($params);

            return $stmt->fetch() ? true : false;
        }

        public static function listarPergunta() {
            $con = Conexao::getConexao();
            $sql = 'SELECT id, texto, status FROM pergunta WHERE status = 1 ORDER BY ordem;';
            $stmt = $con->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function inserirPergunta($texto, $ordem, $status = 1) {

            if (self::existeOrdem($ordem)) {
                return false;
            }

            $con = Conexao::getConexao();
            $sql = "INSERT INTO pergunta (texto, status, ordem) VALUES (:texto, :status);";
            $stmt = $con->prepare($sql);
            $stmt->execute([':texto' => $texto,
                            ':status' => $status]);
        }

        public static function atualizarPergunta($id, $texto, $status) {

            if (self::existeOrdem($ordem, $id)) {
                return false;
            }

            $con = Conexao::getConexao();
            $sql = "UPDATE pergunta SET texto = :texto, status = :status WHERE id = :id;";
            $stmt = $con->prepare($sql);
            $stmt->execute([':id' => $id,
                            ':texto' => $texto,
                            ':status' => $status]);
        }

        public static function deletarPergunta($id, $texto, $status) {
            $con = Conexao::getConexao();
            $sql = "DELETE FROM pergunta WHERE id = :id;";
            $stmt = $con->prepare($sql);
            $stmt->execute([':id' => $id]);
        }
    }

    // $init = Pergunta::listarPergunta();
    // foreach ($init as $valor) {
    //     echo "ID: {$valor['id']} - Texto: {$valor['texto']} - Status: {$valor['status']}<br>";
    // }

?>