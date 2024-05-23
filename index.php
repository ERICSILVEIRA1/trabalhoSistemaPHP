<form method="post">
  <nav>
    <ul>
      <li><input type="radio" name="opcao" value="1"> 1. Criar Usuário</li>
      <li><input type="radio" name="opcao" value="2"> 2. Atualizar Usuário</li>
      <li><input type="radio" name="opcao" value="3"> 3. Ver Usuário</li>
      <li><input type="radio" name="opcao" value="4"> 4. Deletar Usuário</li>
    </ul>
    <input type="submit" value="Escolher">
  </form>

<?php
  if (isset($_POST['opcao'])) {
    $opcao = $_POST['opcao'];
    if ($opcao == 1) {
      echo "Você escolheu criar um usuário!";
      echo '<form action="" method="post">

      <label for="">Nome:</label>
      <input type="text" name="nome" id="">
  
      <label for="">Usuario:</label>
      <input type="text" name="usuariuo" id="">
  
      <label for="">Senha:</label>
      <input type="text" name="senha" id="">
  
      <input type="submit" value="Login">
  
  </form>';

    } elseif ($opcao == 2) {
      echo "Você escolheu atualizar um usuário!";
      echo '<form action="" method="post">

      <label for="">Nome:</label>
      <input type="text" name="nome" id="">
  
      <label for="">Usuario:</label>
      <input type="text" name="usuariuo" id="">
  
      <label for="">Senha:</label>
      <input type="text" name="senha" id="">
  
      <input type="submit" value="Login">
  
  </form>';

    } elseif ($opcao == 3) {
      echo "Você escolheu ver um usuário!";
      echo '<form action="" method="post">

      <label for="">Nome:</label>
      <input type="text" name="nome" id="">
  
      <label for="">Usuario:</label>
      <input type="text" name="usuariuo" id="">
  
      <label for="">Senha:</label>
      <input type="text" name="senha" id="">
  
      <input type="submit" value="Login">
  
  </form>';

    } elseif ($opcao == 4) {
      echo "Você escolheu deletar um usuário!";
      echo '<form action="" method="post">

      <label for="">Nome:</label>
      <input type="text" name="nome" id="">
  
      <label for="">Usuario:</label>
      <input type="text" name="usuariuo" id="">
  
      <label for="">Senha:</label>
      <input type="text" name="senha" id="">
  
      <input type="submit" value="Login">
  
  </form>';
    }
  }
?>