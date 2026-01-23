<?php
    require_once __DIR__ . '/../../config/Conexao.php';

    class Admin {
        public static function buscarPorUsuario($user) {
            $conn = Conexao::getConexao();

            $sql = "SELECT id, usuario, senha FROM usuario WHERE usuario = :user;";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':user' => $user]);
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public static function listarUsuario() {
            $conn = Conexao::getConexao();

            $sql = "SELECT id, usuario, senha FROM usuario";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function inserirUsuario($usuario, $senha, $acesso) {
            $conn = Conexao::getConexao();

            $sql = "INSERT INTO usuario (usuario, senha, acesso) VALUES (:user, :pass, :access);";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':user' => $usuario,
                            ':pass' => $senha,
                            ':access' => $acesso]);
        }
    }
?> 