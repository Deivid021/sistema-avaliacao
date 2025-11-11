document.addEventListener('DOMContentLoaded', async () => {
    try {
        const res = await fetch('../../index.php?acao=listar');
        const perguntas = await res.json();

        const perguntaEl = document.querySelector('#pergunta');
        const botoesEl = document.querySelector('#botoes');
        let atual = 0;
        const respostas = [];

        function mostrarPergunta() {
            const p = perguntas[atual];
            perguntaEl.innerHTML = `<h2>${p.texto}</h2>`;
            botoesEl.innerHTML = '';

            for (let i = 0; i <= 10; i++) {
                const btn = document.createElement('button');
                btn.textContent = i;
                btn.addEventListener('click', () => salvarResposta(p.id, i));
                botoesEl.appendChild(btn);
            }
        }

        function salvarResposta(perguntaId, resposta) {
            respostas.push({ pergunta_id: perguntaId, resposta });
            proximaPergunta();
        }

        async function proximaPergunta() {
            atual++;
            if (atual < perguntas.length) {
                mostrarPergunta();
            } else {
                perguntaEl.innerHTML = '<h2>Obrigado pela avaliação!</h2>';
                botoesEl.innerHTML = '';

                // envia as respostas pro PHP
                const formData = new FormData();
                formData.append('respostas', JSON.stringify(respostas));

                console.log('Enviando respostas para o PHP:', respostas);

                await fetch('../../index.php?acao=salvar', {
                    method: 'POST',
                    body: formData
                });

                const respostaServidor = await fetch('../../index.php?acao=salvar', {
                    method: 'POST',
                    body: formData
                });
                
                console.log('Status do envio:', respostaServidor.status);

            }
        }

        mostrarPergunta();

    } catch (erro) {
        console.error('Erro ao carregar perguntas:', erro);
    }
});
