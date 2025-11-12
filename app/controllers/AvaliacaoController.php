<?php
    require_once __DIR__ . '/../models/Avaliacao.php';
    require_once __DIR__ . '/../models/Pergunta.php';

    class AvaliacaoController {

        public function exibeFormulario() {
            include __DIR__ . '/../views/Formulario.html';
        }
        
        public function listarPerguntas() {
            header('Content-Type: application/json'); // define o tipo de conteudo como JSON
            echo json_encode(Pergunta::listarPergunta()); // retorna a lista de perguntas em formato JSON
        }

        public function enviaAvaliacao() {
            $dados = json_decode($_POST['respostas'], true); // transforma JSON em array associativo
            $feedback = isset($_POST['feedback']) ? $_POST['feedback'] : null;
            Avaliacao::salvarAvaliacao($dados, $feedback);
            echo json_encode(['status' => 'sucesso']); // retorna uma resposta de sucesso em JSON
        }
    }
?>