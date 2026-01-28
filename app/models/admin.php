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

            $sql = "SELECT id, usuario, senha, acesso FROM usuario";
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

        public static function editarUsuario($id, $usuario, $senha, $acesso) {
            $conn = Conexao::getConexao();

            $sql = "UPDATE usuario SET usuario = :user, senha = :pass, acesso = :access WHERE id = :id;";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id' => $id,
                            ':user' => $usuario,
                            ':pass' => $senha,
                            ':access' => $acesso]);
        }

        public static function deletarUsuario($id) {
            $conn = Conexao::getConexao();
            
            $sql = "DELETE FROM usuario WHERE id = :id;";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id' => $id]);
        }

        public static function contarUsuario() {
            $conn = Conexao::getConexao();

            $sql = "SELECT COUNT(*) FROM usuario;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchColumn();
        }

        public static function buscarPorId($id) {
            $conn = Conexao::getConexao();

            $sql = "SELECT id, usuario, acesso FROM usuario WHERE id = :id;";

            $stmt = $conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?> 