document.addEventListener('DOMContentLoaded', async () => {
    try {
        const res = await fetch('../../index.php?acao=listar'); // chamada ajax que busca as perguntas e retorna json
        const perguntas = await res.json(); // pega o json e transforma em array de objetos JS

        const perguntaEl = document.querySelector('#pergunta');
        const botoesEl = document.querySelector('#botoes');
        let atual = 0;
        const respostas = [];

        function mostrarPergunta() {
            const pergunta = perguntas[atual];
            perguntaEl.innerHTML = `<h2>${pergunta.texto}</h2>`;
            botoesEl.innerHTML = '';

            for (let indice = 0; indice <= 10; indice++) {
                const botaoNumerico = document.createElement('button');
                botaoNumerico.textContent = indice;
                botaoNumerico.addEventListener('click', () => salvarResposta(pergunta.id, indice));
                botoesEl.appendChild(botaoNumerico);
            }
        }

        function mostrarFeedback() {
            
            perguntaEl.innerHTML = `
                <h2>Deseja deixar um feedback?</h2>
                <textarea id="feedback" placeholder="Deixe seu feedback (opcional)"></textarea>
                <button id="enviarFeedback">Enviar Feedback</button>
            `;
            botoesEl.innerHTML = '';

            document.querySelector('#enviarFeedback').addEventListener('click', async () => {
                const feedback = document.querySelector('#feedback').value.trim();

                // envia as respostas pro PHP
                const formData = new FormData(); // cria uma especia de formulario virtual para enviar os dados
                formData.append('respostas', JSON.stringify(respostas)); // adiciona as respostas em formato JSON
                formData.append('feedback', feedback); // adiciona o feedback

                const respostaServidor = await fetch('../../index.php?acao=salvar', {
                    method: 'POST',
                    body: formData
                });

                perguntaEl.innerHTML = `<h2>O estabelecimento agradece sua resposta!</h2>
                                        <p>Ela é muito importante para nós e nos ajuda a melhorar continuamente nossos serviços.</p>`;
                botoesEl.innerHTML = '';
            });
        }

        function salvarResposta(perguntaId, resposta) {
            respostas.push({ id_pergunta: perguntaId, resposta });
            proximaPergunta();
        }

        async function proximaPergunta() {
            atual++;
            if (atual < perguntas.length) {
                mostrarPergunta();
            } else {
                mostrarFeedback();
            }
        }

        mostrarPergunta();

    } catch (erro) {
        console.error('Erro ao carregar perguntas:', erro);
    }
});
