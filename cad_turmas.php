<!DOCTYPE html>

<?php

    if (isset($_POST['Registrar'])) {
        include_once('config.php');
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $codigo_classroom = isset($_POST['codigo_classroom']) ? $_POST['codigo_classroom'] : '';
        $num_alunos = isset($_POST['num_alunos']) ? $_POST['num_alunos'] : '';
        $classe = isset($_POST['classe']) ? $_POST['classe'] : '';
        $coordenador = isset($_POST['coordenador']) ? $_POST['coordenador'] : '';
        $ano = isset($_POST['ano']) ? $_POST['ano'] : '';

        $stmt = $conexao->prepare("INSERT INTO turmas (nome, codigo_classroom, num_alunos, classe, coordenador, ano) VALUES (?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("ssisss", $nome, $codigo_classroom, $num_alunos, $classe, $coordenador, $ano);
            $stmt->execute();
            $stmt->close();
            $conexao->close();
        } else {
            echo "Erro na preparação da declaração SQL.";
        }
    }

    require_once 'dompdf/autoload.inc.php';

if (isset($_POST['Imprimir'])) {
    include_once('config.php');

    // Consulta SQL para obter os dados da turma
    $sql = "SELECT * FROM turmas ORDER BY id DESC LIMIT 1";
    $result = $conexao->query($sql);
    $row = $result->fetch_assoc();

    // Criação do HTML para o PDF
    $html = '<html><body>';
    $html .= '<h1>Dados da Turma</h1>';
    $html .= '<p>Nome: ' . $row['nome'] . '</p>';
    $html .= '<p>Código do Classroom: ' . $row['codigo_classroom'] . '</p>';
    $html .= '<p>Número de Alunos: ' . $row['num_alunos'] . '</p>';
    $html .= '<p>Classe: ' . $row['classe'] . '</p>';
    $html .= '<p>Coordenador: ' . $row['coordenador'] . '</p>';
    $html .= '<p>Ano: ' . $row['ano'] . '</p>';
    $html .= '</body></html>';

    // Criação do objeto Dompdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');

    // Renderização do PDF
    $dompdf->render();

    // Saída do PDF
    $dompdf->stream('relatorio_turma.pdf', ['Attachment' => 0]);
}
?>

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
                <form action="" method="POST">


          <div class="cont_inp">
              <div class="input-group">
                  <label for="nome">Nome</label>
                    <input id="nome" class="inp_group" type="text" name="nome" id="nome">
              </div>

              <div class="input-group">
                <label for="codigo_classroom">Código do Classroom</label>
                <input class="inp_group" type="text" name="codigo_classroom" id="codigo_classroom">
            </div>

                 <div class="input-group">
                      <label for="num_alunos">Nº Alunos</label>
                    <input class="inp_group" type="number" name="num_alunos" id="num_alunos">
                </div>

                <div class="input-group">
                    <label for="classe">Classe</label>
                    <select class="inp_group" name="classe" id="classe">
                    <option value="1ª">1ª</option>
                    <option value="2ª">2ª</option>
                    <option value="3ª">3ª</option>
                    <option value="4ª">4ª</option>
                    <option value="5ª">5ª</option>
                    <option value="6ª">6ª</option>
                    <option value="7ª">7ª</option>
                    <option value="8ª">8ª</option>
                    <option value="9ª">9ª</option>
                    <option value="10ª">10ª</option>
                    <option value="11ª">11ª</option>
                    <option value="12ª">12ª</option>
                    <option value="13ª">13ª</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="coordenador">Coordenador</label>
                    <input type="text" class="inp_group" name="coordenador" id="coordenador">
                </div>
                
                <div class="input-group">
                    <label for="ano">Ano</label>
                    <input text="number" class="inp_group" name="ano" id="ano">
                </div>
               
          </div>

            <input class="inp_submit" type="submit" name="Registrar" value="Registrar">
            
                </form>
        </div>
</body>
</html>