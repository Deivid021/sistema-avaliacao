<?php

class LoginController {

    public function index() {
        require __DIR__ . "/../../views/admin/login.php";
    }

    public function autenticarUsuario() {
        // require_once __DIR__ . "/../../models/admin.php";
        require_once __DIR__ . "/../../core/Auth.php";

        // Auth::logar();

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if ($user == 'adm' && $pass == 'pass') {
            // $_SESSION['admin_id'] = $admin['id'];
            header("Location: app/views/admin/perguntas/listar.php");
        } else {
            header("Location: /admin.php?route=login&erro=1");
        }
    }
}
