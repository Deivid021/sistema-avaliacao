<?php

class LoginController {

    public function index() {
        require __DIR__ . "/../../views/admin/login.php";
    }

    public function autenticar() {
        require_once __DIR__ . "/../../models/Admin.php";
        require_once __DIR__ . "/../../core/Auth.php";

        Auth::iniciarSessao();

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $admin = Admin::buscarPorEmail($email);

        if ($admin && password_verify($senha, $admin['senha'])) {
            $_SESSION['admin_id'] = $admin['id'];
            header("Location: /admin.php?route=dashboard");
        } else {
            header("Location: /admin.php?route=login&erro=1");
        }
    }
}
