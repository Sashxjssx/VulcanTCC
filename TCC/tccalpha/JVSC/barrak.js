async function searchGames() {
    const query = document.getElementById('searchbar').value;
    const resultsContainer = document.getElementById('resultsContainer');

    // Limpa os resultados se a barra de pesquisa estiver vazia
    if (query.length === 0) {
        resultsContainer.innerHTML = '';
        resultsContainer.classList.remove('show');
        return;
    }

    try {
        const response = await fetch(`search.php?q=${query}`);
        const games = await response.json();

        // Limpa o contêiner antes de adicionar os novos resultados
        resultsContainer.innerHTML = '';

        if (games.length > 0) {
            // Adiciona a classe 'show' para exibir os resultados
            resultsContainer.classList.add('show');

            // Adiciona os resultados encontrados
            games.forEach(game => {
                const gameElement = document.createElement('li');
                gameElement.classList.add('game-item');
                gameElement.innerHTML = `
                    <a href="jogo.php?id=${game.id}">
                        <img src="${game.imagem}" alt="${game.nome} Logo" class="logo-image">
                        <h1>${game.nome}</h1>
                        <h2>R$ ${game.preco}</h2>
                    </a>
                `;
                resultsContainer.appendChild(gameElement);
            });
        } else {
            // Caso não haja resultados, exibe mensagem
            resultsContainer.classList.add('show');
            resultsContainer.innerHTML = '<p>Nenhum jogo encontrado.</p>';
        }

    } catch (error) {
        console.error('Erro ao buscar jogos:', error);
    }
}
