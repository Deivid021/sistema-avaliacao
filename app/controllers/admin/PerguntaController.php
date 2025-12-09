<?php
require_once __DIR__ . '/../../models/pergunta.php';

class PerguntaController {
    public function listar() {
        $dados = Pergunta::listarPergunta();
        require __DIR__ . '/../../views/admin/perguntas/listar.php';
    }

    public function criar() {
        require __DIR__ . '/../../views/admin/perguntas/criar.php';
    }

    public function salvar() {
        Pergunta::inserirPergunta($_POST['texto'], $_POST['status']);
        header("Location: /admin.php?route=pergunta/listar");
    }

    public function editar() {
        $id = $_GET['id'];
        $todas = Pergunta::listarPergunta();

        $pergunta = null;
        foreach ($todas as $p) {
            if ($p['id'] == $id) {
                $pergunta = $p;
                break;
            }
        }

        require __DIR__ . '/../../views/admin/perguntas/editar.php';
    }

    public function atualizar() {
        Pergunta::atualizarPergunta($_POST['id'], $_POST['texto'], $_POST['status']);
        header("Location: /admin.php?route=pergunta/listar");
    }

    public function excluir(){
        Pergunta::deletarPergunta($_GET['id']);
        header("Location: /admin.php?route=pergunta/listar");
    }
}
