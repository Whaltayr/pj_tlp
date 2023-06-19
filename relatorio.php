<!DOCTYPE html>
<?php

require_once 'dompdf/autoload.inc.php';

    include_once('config.php');

    // Verifica se o formulário foi enviado para gerar o relatório
    if (isset($_POST['Imprimir'])) {
        // Obtém o ID da turma selecionada no formulário
        $turmaId = isset($_POST['turma']) ? $_POST['turma'] : '';

        // Consulta SQL para obter os dados da turma
        $sql = "SELECT * FROM turmas WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $turmaId);
        $stmt->execute();
        $result = $stmt->get_result();
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
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');

        // Renderização do PDF
        $dompdf->render();

        // Saída do PDF
        $dompdf->stream('relatorio_turma.pdf', ['Attachment' => 0]);
        exit(); // Encerra o script após gerar o PDF
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
    <header class="header_reg_turmas">
        <nav>
            <ul>
                <li> <a href="home.php">HOME</a></li>
                <li><a href="cad_prof.php">PROFESSORES</a></li>
                <li><a href="cad_turmas.php">TURMAS</a></li>
                <li><a href="cad_dis.php">DISCIPLINAS</a></li>
                <li><a href="relatorio.php">RELATÓRIOS</a></li>
            </ul>
        </nav>
    </header>

    <main class="main_rel">
        <h4 class="h4cad">Registro de Disciplinas</h4>
        <form method="POST" class="container_rel">
            <div class="input-group_rel">
                <label for="turma">Turma</label>
                <select class="inp_group_rel" name="turma" id="turma">
                    <?php
                        // Consulta SQL para obter as turmas disponíveis
                        $sql = "SELECT * FROM turmas";
                        $result = $conexao->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="reg_rel">
                <button class="input_rel" type="submit" name="Imprimir" value="Imprimir">Gerar Relatório</button>
            </div>
        </form>
    </main>
    
</body>
</html>
