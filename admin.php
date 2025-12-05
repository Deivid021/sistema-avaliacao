<?php
require_once __DIR__ . '/app/core/Auth.php';

Auth::exigirLogin();

switch ($route) {

    case 'pergunta/listar':
        require_once __DIR__ . '/app/controllers/admin/PerguntaController.php';
        $c = new PerguntaController();
        $c->listar();
        break;

    case 'pergunta/criar':
        require_once __DIR__ . '/app/controllers/admin/PerguntaController.php';
        $c = new PerguntaController();
        $c->criar();
        break;

    case 'pergunta/salvar':
        require_once __DIR__ . '/app/controllers/admin/PerguntaController.php';
        $c = new PerguntaController();
        $c->salvar();
        break;

    case 'pergunta/editar':
        require_once __DIR__ . '/app/controllers/admin/PerguntaController.php';
        $c = new PerguntaController();
        $c->editar();
        break;

    case 'pergunta/atualizar':
        require_once __DIR__ . '/app/controllers/admin/PerguntaController.php';
        $c = new PerguntaController();
        $c->atualizar();
        break;

    case 'pergunta/excluir':
        require_once __DIR__ . '/app/controllers/admin/PerguntaController.php';
        $c = new PerguntaController();
        $c->excluir();
        break;

    default:
        echo "Rota não encontrada";
}
