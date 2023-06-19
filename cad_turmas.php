<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Turmas</title>
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
            <h4>Registro de turmas</h4>
                <form action="" method="get">


          <div class="cont_inp">
              <div class="input-group">
                  <label for="nome">Nome</label>
                    <input id="nome" class="inp_group" type="text" name="nome" id="nome">
              </div>

              <div class="input-group">
                <label for="email">Código do Classroom</label>
                <input class="inp_group" type="email" name="email" id="email">
            </div>

                 <div class="input-group">
                      <label for="num_alunos">Nº Alunos</label>
                    <input class="inp_group" type="number" name="num_alunos" id="num_alunos">
                </div>

                <div class="input-group">
                    <label for="classe">Classe</label>
                    <select class="inp_group" name="classe" id="classe"></select>
                </div>

                <div class="input-group">
                    <label for="professor">Professor</label>
                    <select class="inp_group" name="professor" id="professor"></select>
                </div>
                
                <div class="input-group">
                    <label for="disciplina">Disciplina</label>
                    <select class="inp_group" name="disciplina" id="disciplina"></select>
                </div>
               
          </div>

            <input class="inp_submit" type="submit" value="Registrar">
            
                </form>
        </div>
</body>
</html>