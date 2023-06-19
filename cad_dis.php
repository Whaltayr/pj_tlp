<!DOCTYPE html>
<?php
 
 if(isset($_POST['Registrar']))
{
    include_once('config.php');
    $nome = $_POST['dis_nome'];

    $stmt = $conexao->prepare("INSERT INTO disciplinas (Nome) VALUES (?)");
    $stmt->bind_param("s", $nome);
    $stmt->execute();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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

    <main class="main_rel">
     

        <h4 class="h4cad">Registro de Disciplinas</h4>
            <form method="POST" class="container_rel">
                
                <div class="input-group_rel">
                    <label for="dis_nome">Nome</label>
                    <input type="text" class="inp_group_rel" name="dis_nome" id="dis_nome"></input>
                </div>
                <div class="reg_rel">
                    <button id="inp_relatorio" class="input_rel" type="submit" name="Registrar" value="Registar">Registar</button>

                </div>

            </form>
    

    </main>
    
</body>
</html>