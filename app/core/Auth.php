<?php

    class Auth {

        public static function iniciarSessao() {
            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }

        public static function logar() {
            self::iniciarSessao();
            $_SESSION['admin_id'] = $usuarioId;
        }

        public static function logout() {
            self::iniciarSessao();
            unset($_SESSION['admin_id']);
        }

        public static function isLogado() {
            self::iniciarSessao();
            return isset($_SESSION['admin_id']);
        }

        public static function exigirLogin() {
            if (!self::isLogado()) {
                header("Location: /admin/login.php");
                exit;
            }
        }
    }
    
?>