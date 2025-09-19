document.addEventListener('DOMContentLoaded', () => {
    const rotaForm = document.getElementById('rotaForm');
    const mensagemDiv = document.getElementById('mensagem');
    const tabelaRotas = document.getElementById('tabelaRotas');
    const tabelaBody = tabelaRotas.querySelector('tbody');
    const listaVaziaP = document.getElementById('listaVazia');

    const partidaInput = document.getElementById('partida');
    const chegadaInput = document.getElementById('chegada');
    const conexoesInput = document.getElementById('conexoes');
    const tempoVooInput = document.getElementById('tempoVoo');
    const rotaIndexInput = document.getElementById('rotaIndex');
    
    const cadastrarBtn = document.getElementById('cadastrarBtn');
    const salvarEdicaoBtn = document.getElementById('salvarEdicaoBtn');
    const cancelarEdicaoBtn = document.getElementById('cancelarEdicaoBtn');
    const botoesEdicaoDiv = document.querySelector('.botoes-edicao');

    let rotas = [];

    function renderizarRotas() {
        tabelaBody.innerHTML = '';
        if (rotas.length === 0) {
            listaVaziaP.classList.remove('hidden');
            tabelaRotas.classList.add('hidden');
        } else {
            listaVaziaP.classList.add('hidden');
            tabelaRotas.classList.remove('hidden');
            
            rotas.forEach((rota, index) => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${rota.partida}</td>
                    <td>${rota.chegada}</td>
                    <td>${rota.conexoes}</td>
                    <td>${rota.tempoVoo}</td>
                    <td>
                        <button class="editar-btn" data-index="${index}">Editar</button>
                        <button class="excluir-btn" data-index="${index}">Excluir</button>
                    </td>
                `;
                tabelaBody.appendChild(tr);
            });
        }
    }

    function excluirRota(index) {
        rotas.splice(index, 1);
        renderizarRotas();
        exibirMensagem('Rota excluída com sucesso!', 'success');
    }

    function editarRota(index) {
        const rota = rotas[index];
        partidaInput.value = rota.partida;
        chegadaInput.value = rota.chegada;
        conexoesInput.value = rota.conexoes;
        tempoVooInput.value = rota.tempoVoo;
        rotaIndexInput.value = index;

        cadastrarBtn.classList.add('hidden');
        botoesEdicaoDiv.classList.remove('hidden');
    }

    tabelaBody.addEventListener('click', (e) => {
        const index = e.target.getAttribute('data-index');
        
        if (e.target.classList.contains('excluir-btn')) {
            excluirRota(index);
        } else if (e.target.classList.contains('editar-btn')) {
            editarRota(index);
        }
    });

    salvarEdicaoBtn.addEventListener('click', (e) => {
        e.preventDefault();

        const rotaIndex = rotaIndexInput.value;
        const partida = partidaInput.value;
        const chegada = chegadaInput.value;
        const conexoes = conexoesInput.value;
        const tempoVoo = tempoVooInput.value;

        const tempoRegex = /^\d{2}:\d{2}$/;
        if (!tempoRegex.test(tempoVoo)) {
            exibirMensagem('O tempo de voo deve estar no formato HH:MM (ex: 02:30).', 'error');
            return;
        }

        rotas[rotaIndex] = { partida, chegada, conexoes, tempoVoo };
        
        renderizarRotas();
        
        exibirMensagem('Rota atualizada com sucesso!', 'success');
        
        resetarFormulario();
    });

    rotaForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const partida = partidaInput.value;
        const chegada = chegadaInput.value;
        const conexoes = conexoesInput.value;
        const tempoVoo = tempoVooInput.value;

        const tempoRegex = /^\d{2}:\d{2}$/;
        if (!tempoRegex.test(tempoVoo)) {
            exibirMensagem('O tempo de voo deve estar no formato HH:MM (ex: 02:30).', 'error');
            return;
        }

        rotas.push({ partida, chegada, conexoes, tempoVoo });
        renderizarRotas();
        exibirMensagem('Rota cadastrada com sucesso!', 'success');
        rotaForm.reset();
    });

    cancelarEdicaoBtn.addEventListener('click', () => {
        resetarFormulario();
        exibirMensagem('Edição cancelada.', 'info');
    });


    function resetarFormulario() {
        rotaForm.reset();
        rotaIndexInput.value = '-1';
        cadastrarBtn.classList.remove('hidden');
        botoesEdicaoDiv.classList.add('hidden');
    }
    
    function exibirMensagem(texto, tipo) {
        mensagemDiv.textContent = texto;
        mensagemDiv.className = `mensagem ${tipo}`;
        mensagemDiv.classList.remove('hidden');

        setTimeout(() => {
            mensagemDiv.classList.add('hidden');
        }, 5000);
    }
    
    renderizarRotas();
});