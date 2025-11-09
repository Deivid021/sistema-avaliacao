<?php
require_once __DIR__ . '/app/controllers/AvaliacaoController.php';

$controller = new AvaliacaoController();

if (isset($_GET['acao']) && $_GET['acao'] === 'salvar') {
    $controller->enviaAvaliacao();
} else {
    $controller->exibeFormulario();
}
