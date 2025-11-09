<?php
    require_once __DIR__ . '/../models/Avaliacao.php';
    require_once __DIR__ . '/../models/Pergunta.php';

    class AvaliacaoController {

        public function exibeFormulario() {
            Pergunta::listarPergunta();
            include __DIR__ . '/../views/Formulario.php';
        }

        public function enviaAvaliacao() {
            Avaliacao::salvarAvaliacao($_POST);
            include __DIR__ . '/../views/Agradecimento.php';
        }
    }
?>