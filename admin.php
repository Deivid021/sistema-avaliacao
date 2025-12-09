<?php
require_once __DIR__ . '/app/core/Auth.php';
require_once __DIR__ . '/app/controllers/admin/PerguntaController.php';

Auth::exigirLogin();

switch ($route) {
    case 'pergunta/listar':
        $controller->listar();
        break;

    case 'pergunta/criar':
        $controller->criar();
        break;

    case 'pergunta/salvar':
        $controller->salvar();
        break;

    case 'pergunta/editar':
        $controller->editar();
        break;

    case 'pergunta/atualizar':
        $controller->atualizar();
        break;

    case 'pergunta/excluir':
        $controller->excluir();
        break;

    default:
        $controller->exibeErro();
}
