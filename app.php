<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <title>Jogo da Velha S.EA</title>
    <style>
        #board {
            display: grid;
            grid-template-columns: repeat(3, 150px);
            grid-gap: 5px;
            margin: 0 auto;
            margin-top: 20px;
        }

        .cell {
            width: 150px;
            height: 150px;
            text-align: center;
            font-size: 150px;
            cursor: pointer;
            border: 3px solid #333;
        }

        .cell:hover {
            background-color: #eeee;
        }
		
		.game-container {
			width: 490px; /* Largura da borda externa */
			padding: 20px; /* Espaçamento interno */
			border: 2px solid #333; /* Estilo da borda */
			margin: 0 auto; /* Centralizar na página */
			background-color: #9999;
		}
		.clear-button {
			width: 200px; /* Largura do botão */
			height: 100px; /* Altura do botão */
			font-size: 50px; /* Tamanho da fonte do texto do botão */
			background-color: #ff0000;
		}
		.player-x {
			color: red; /* Define a cor vermelha para o texto */
        }
        .body {
            color: rgb(17, 0, 255); /* Define a cor vermelha para o fundo */
        }       
        
    </style>
</head>
<body>
<style>
        .body {
            color: rgb(17, 0, 255); /* Define a cor vermelha para o fundo */
        }       

</style>

    <h1>INSTRUÇÕES</h1>
    <h2>Este jogo é para 2 jogadores</h2>
    <h2>Primeiro o jogador "X" começa e depois o "O"</h2>

<div class="game-container">
    <h1>JOGO DA VELHA - TIC TAC TOE</h1>
    <button id="clearButton" class="clear-button">CLEAR</button>
    <div id="board"></div>
    <p id="winner"></p>
	
    <h1><b>S.EA - Company</b></h1>
    <div id="board"></div>
    <p id="winner"></p>
	
</div>

    <script>
        const board = document.getElementById("board");
        const winnerDisplay = document.getElementById("winner");

        let currentPlayer = "X";
        let boardState = ["", "", "", "", "", "", "", "", ""];

        function checkWinner() {
            const winningCombos = [
                [0, 1, 2],
                [3, 4, 5],
                [6, 7, 8],
                [0, 3, 6],
                [1, 4, 7],
                [2, 5, 8],
                [0, 4, 8],
                [2, 4, 6],
            ];

            for (const combo of winningCombos) {
                const [a, b, c] = combo;
                if (boardState[a] && boardState[a] === boardState[b] && boardState[a] === boardState[c]) {
                    return boardState[a];
                }
            }

            if (!boardState.includes("")) {
                return "T";
            }

            return null;
        }

        function handleCellClick(index) {
            if (boardState[index] || winnerDisplay.textContent !== "") {
                return;
            }

            boardState[index] = currentPlayer;
            board.children[index].textContent = currentPlayer;
            currentPlayer = currentPlayer === "X" ? "O" : "X";

            const winner = checkWinner();
            if (winner) {
                if (winner === "T") {
                    winnerDisplay.textContent = "Empate!";
                } else {
                    winnerDisplay.textContent = `${winner} venceu!`;
                }
            }
        }

        function createBoard() {
            for (let i = 0; i < 9; i++) {
                const cell = document.createElement("div");
                cell.classList.add("cell");
                cell.addEventListener("click", () => handleCellClick(i));
                board.appendChild(cell);
            }
        }

        createBoard();
		
		const clearButton = document.getElementById("clearButton");

	clearButton.addEventListener("click", () => {
    // Limpa o estado do tabuleiro
    boardState = ["", "", "", "", "", "", "", "", ""];

    // Remove o conteúdo das células no tabuleiro
    const cells = document.querySelectorAll(".cell");
    cells.forEach((cell) => {
        cell.textContent = "";
    });

    // Limpa a exibição do vencedor
    winnerDisplay.textContent = "";

    // Define o jogador atual como "X" (ou qualquer jogador que você preferir começar)
    currentPlayer = "X";
});

    </script>
</body>
</html>
