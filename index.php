<?php
require_once __DIR__ . '/app/controllers/AvaliacaoController.php';

$controller = new AvaliacaoController();

if (isset($_GET['acao'])) {
    switch ($_GET['acao']) {
        case 'salvar':
            $controller->enviaAvaliacao();
        break;

        case 'listar':
            $controller->listarPerguntas();
        break;

        default:
            $controller->exibeFormulario();
        break;
    }
} else {
    $controller->exibeFormulario();
}
?>