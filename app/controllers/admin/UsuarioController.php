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

        $senhaCriptografada = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        Admin::inserirUsuario($_POST['user'], $senhaCriptografada, $_POST['access']);
        header("Location: /admin.php?route=usuario/listar");
        exit;
    }
    
    public function deletarUsuario() {
        
        $id = $_GET['id'] ?? null;
        
        if(Admin::contarUsuario() > 1) {
            
            Admin::deletarUsuario($id);
            header("Location: /admin.php?route=usuario/listar"); 
            exit;
        }
        
        header("Location: /admin.php?route=usuario/listar"); 
    }
    
    public function editarUsuario() {
        
        $id = $_GET['id'] ?? null;

        $dados = Admin::buscarPorId($id);
        require __DIR__ . '/../../views/admin/usuario/editarUsuario.php';
    }
    
    public static function atualizarUsuario() {

        $senhaCriptografada = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        Admin::editarUsuario($_POST['id'], $_POST['user'], $senhaCriptografada, $_POST['access']);
        header("Location: admin.php?route=usuario/listar"); 
        exit;
    }
}
