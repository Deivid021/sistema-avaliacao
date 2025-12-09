<?php

class Auth {

    public static function iniciarSessao() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function logar($usuarioId) {
        self::iniciarSessao();
        $_SESSION['admin_id'] = $usuarioId;
    }

    public static function deslogar() {
        self::iniciarSessao();
        unset($_SESSION['admin_id']);
    }

    public static function estaLogado() {
        self::iniciarSessao();
        return isset($_SESSION['admin_id']);
    }

    public static function exigirLogin() {
        if (!self::estaLogado()) {
            header("Location: app/views/admin/login.php");
            exit;
        }
    }
}

?>
