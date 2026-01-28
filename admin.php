<?php
require_once __DIR__ . '/app/core/Auth.php';

// controllers
require_once __DIR__ . '/app/controllers/admin/PerguntaController.php';
require_once __DIR__ . '/app/controllers/admin/LoginController.php';
require_once __DIR__ . '/app/controllers/admin/UsuarioController.php';

$route = $_GET['route'] ?? 'login';

    switch ($route) {
        case 'login':
            $controller = new LoginController();
            $controller->index();
        break;

        case 'login/autenticar':
            $controller = new LoginController();
            $controller->autenticarUsuario();
        break;

        // case 'dashboard':
        //     Auth::exigirLogin();
        //     $route->autenticarUsuario();
        // break;

        case 'usuario/listar':
            Auth::exigirLogin();
            $controller = new UsuarioController();
            $controller->listarUsuario();
        break;

        case 'usuario/criar':
            Auth::exigirLogin();
            $controller = new UsuarioController();
            $controller->criarUsuario();
        break;

        case 'usuario/inserir':
            Auth::exigirLogin();
            $controller = new UsuarioController();
            $controller->inserirUsuario();
        break;

        case 'usuario/editar':
            Auth::exigirLogin();
            $controller = new UsuarioController();
            $controller->editarUsuario();
        break;

        case 'usuario/atualizar':
            Auth::exigirLogin();
            $controller = new UsuarioController();
            $controller->atualizarUsuario();
        break;

        case 'usuario/excluir':
            Auth::exigirLogin();
            $controller = new UsuarioController();
            $controller->deletarUsuario();
        break;

        default:
            $controller = new LoginController();
            $controller->index();
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