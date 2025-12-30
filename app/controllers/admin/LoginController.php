<?php
require_once __DIR__ . "/../../core/Auth.php";
require_once __DIR__ . '/../../models/admin.php';

class LoginController {

    public function index() {
        require __DIR__ . "/../../views/admin/login.php";
    }

    public function autenticarUsuario() {

        Auth::iniciarSessao();

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $admin = Admin::buscarPorUsuario($user);

        if ($admin && password_verify($pass, $admin['senha'])) {
        
            Auth::logar($admin['id']);
            header("Location: app/views/admin/perguntas/listar.php");
            exit;
        } 
        
        header("Location: /../../admin.php?route=login&erro=1");
        exit;
    }
}
