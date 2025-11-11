<?php
    require_once __DIR__ . '/../models/Avaliacao.php';
    require_once __DIR__ . '/../models/Pergunta.php';

    class AvaliacaoController {

        public function exibeFormulario() {
            include __DIR__ . '/../views/Formulario.html';
        }

        public function enviaAvaliacao() {
            $dados = json_decode($_POST['respostas'], true);
            Avaliacao::salvarAvaliacao($dados);
            include __DIR__ . '/../views/Agradecimento.php';
        }


        public function listarPerguntas() {
            header('Content-Type: application/json');
            echo json_encode(Pergunta::listarPergunta());
        }
    }
?>