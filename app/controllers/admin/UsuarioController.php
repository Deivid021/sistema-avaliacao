<?php
require_once __DIR__ . '/../../models/admin.php';

class UsuarioController {

    public function listarUsuario() {
        $dados = Admin::listarUsuario();
        require __DIR__ . '/../../views/admin/usuario/listarUsuario.php';
    }

    public function criarUsuario() {
        require __DIR__ . '/../../views/admin/usuario/criarUsuario.php';
    }

    public function inserirUsuario() {
        Admin::inserirUsuario($_POST['user'], $_POST['pass']);
        header("Location: /admin.php?route=usuarios/listar");
    }
}
