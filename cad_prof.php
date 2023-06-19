<!DOCTYPE html>
<?php
    if(isset($_POST['submit']))
    {
        include_once('config.php');
        $nome = $_POST['nome'];
        $data_nasc = $_POST['data_nasc'];
        $Telefone = $_POST['Telefone'];
        $nif = $_POST['nif'];
        $email = $_POST['email'];
        $disciplina = $_POST['disciplina'];
    
        $stmt = $conexao->prepare("INSERT INTO professores (nome, data_nasc, Telefone, nif, email, disciplina) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nome, $data_nasc, $Telefone, $nif, $email, $disciplina);
        $stmt->execute();
    }
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Professores</title>
</head>
<body>

    <header class="header_reg_turmas"><nav>
        <ul>
            <li> <a href="home.php">HOME</a></li>
            <li><a href="cad_prof.php">PROFESSORES</a></li>
            <li><a href="cad_turmas.php">TURMAS</a></li>
            <li><a href="cad_dis.php">DISCIPLINAS</a></li>
            <li><a href="relatorio.php">RELÁTORIOS</a></li>
        </ul>
    </nav></header>

        <div class="container">
            <h4 class="h4cad">Registro de Professores</h4>
            
                <form action="" method="POST">


          <div class="cont_inp">
              <div class="input-group">
                  <label for="nome">Nome</label>
                    <input id="nome" class="inp_group" type="text" name="nome" id="nome">
              </div>

              <div class="input-group">
                <label for="num_alunos">Data de Nascimento</label>
              <input class="inp_group" type="date" name="data_nasc" id="data_nasc">
          </div>

          <div class="input-group">
            <label for="classe">Telefone</label>
            <input type="tel" class="inp_group" name="Telefone" id="Telefone"></input>
        </div>

        <div class="input-group">
            <label for="nif">NIF</label>
           <input class="inp_group" type="text" name="nif" id="nif">
        </div>

              <div class="input-group">
                <label for="email">E-mail</label>
                <input class="inp_group" type="email" name="email" id="email">
            </div>           
                <div class="input-group">
                    <label for="disciplina">Disciplina</label>
                    <input type="text" class="inp_group" name="disciplina" id="disciplina">
                </div>   
          </div>
           <button class="inp_submit" name="submit" value="submit" type="submit"> Registar</button>
           
                </form>
        </div>
    
</body>
</html>