<?php
    require_once __DIR__ . '/../../config/Conexao.php';

    class Admin {
        public static function buscarPorUsuario($user) {
            $conn = Conexao::getConexao();

            $sql = "SELECT id, login, senha FROM usuario WHERE login = :user;";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':user' => $user]);
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?> 