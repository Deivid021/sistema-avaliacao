<?php
require_once __DIR__ . '/app/core/Auth.php';
require_once __DIR__ . '/app/controllers/admin/PerguntaController.php';
require_once __DIR__ . '/app/controllers/admin/LoginController.php';

// Auth::exigirLogin();

$route = new LoginController();

    switch ($_GET['route'] ?? 'login') {
        case 'login/autenticar':
            $route->autenticarUsuario();
        break;

        default:
            $route->index();
        break;
    }


    
/*
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

*/
?>