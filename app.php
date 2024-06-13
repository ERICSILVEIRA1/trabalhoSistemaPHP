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
<footer>
    <br><br>
    <p><b>LOGUIN SOMENTE PARA MANUTENÇÃO</b></p>
     
    <?php 
    
        require_once "admin.php";
        $usuarioSes = $_SESSION["usuario"]?? null;
        //echo "Deu certo?";

        // echo print_r($_POST);
        $nome = $_POST["nome"] ?? null;
        $usuario = $_POST["usuario"] ?? null;
        $senha = $_POST["senha"] ?? null;

       // echo "$nome -- $usuario -- $senha";
           
                    

        if(is_null($usuario) && is_null($senha)){
            echo "Fazer Login";
           
            echo '<form action="index1.php" method="post">

            <label for="">Nome:</label>
            <input type="text" name="nome" id="">
        
            <label for="">Usuario:</label>
            <input type="text" name="usuariuo" id="">
        
            <label for="">Senha:</label>
            <input type="text" name="senha" id="">  
        
            <input type="submit" value="Login">
        
        </form>';
           

        }else{
            require_once "verUsuarios.php";
            if(verUsuarios($nome, $usuario, $senha)){
                $_SESSION["usuario"] = $usuario;
                echo "<script>document.getElementById('login-form').style.display = 'none';</script>";
                echo "";
                echo "<h1>Login realizado com sucesso!</h1>";
                echo "<script>document.getElementById('login-form').style.display = 'none';</script>";
                echo "<p>Seu login é: <strong>" . $nome . "</strong></p>";
                echo "<p>Seu login é: <strong>" . $usuario . "</strong></p>";
                echo "<p>Sua senha é: <strong>" . $senha . "</strong></p>";
                echo "<p>Para segurança, recomendamos que você altere sua senha.</p>";
            
                echo "<a href='Loguin/index.php'>Index</a>";
                echo'<form action= "http://localhost/trabalhoSistemaPHP/index1.php" method="get" target="_blank">
                <input type="submit" value="Abrir Google em nova guia">
                </form>';
            }else{
                echo '<form action="index1.php" method="post">

                <label for="">Nome:</label>
                <input type="text" name="nome" id="">
            
                <label for="">Usuario:</label>
                <input type="text" name="usuariuo" id="">
            
                <label for="">Senha:</label>
                <input type="text" name="senha" id="">
            
                <input type="submit" value="Login">
            
            </form>

</form>';
                echo "Tentar Novamente";
            }

        }
        
    ?>
</body>
</html>
