<?php

require "Class/Conn.php";
require "Class/Crud.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Projeto EECP</title>
</head>
<body>

    <h1 id="titulo"> Projeto Guia de Ocorrencia</h1>

    <form method="POST">
        <div id="form1">
            Masp:
                <input type="text" id="masp" name="masp" placeholder="Digite o masp">
            Adimissão:
                <input type="text" id="numeroAdimissao" name="numeroAdimissao" placeholder="Digite o numero de adimissão">
            Servidor:
                <input type="text" id="nomeServidor" name="nomeServidor" placeholder="Digite o nome do servidor">
            Situação em exercicio: 
                <input type="text" id="exercicioServidor" name="exercicioServidor" placeholder="Digite a Situação de exercicio do servidor">
            Afastamento:
                <input type="text" id="afastamento" name="afastamento" placeholder="Qual o tipo de afastamento do servidor?">
            Descrição:
                <input type="text" id="descricao" name="descricao" placeholder="Escreva uma descrição">
            Observação:
                <input type="text" id="observacao" name="observacao" placeholder="Alguma Observação?">
                <input type="submit" id="enviar" name="botao" value="Confirma Informações">
        </div>
    </form>
<?php 
if(isset($_POST['botao'])) {
    //verificar se ah algum campo vazio
    if(!verificarCamposNull($_POST)) {
        print "Erro: Existem campos obrigatorios vazios";
    } else { 
        print "todos os campos preenchidos de forma correta!";
        $masp = $_POST['masp'];
        $adimissao = $_POST['numeroAdimissao']; 
        $servidor = $_POST['nomeServidor'];
        $exercicio = $_POST['exercicioServidor'];
        $afastamento = $_POST['afastamento']; 
        $descricao = $_POST['descricao']; 
        $observacao = $_POST['observacao'];
        
        $crud = new Crud($masp, $adimissao, $servidor, $exercicio, $afastamento, $descricao, $observacao); 
        $crud->inserir(); 
    }     
    // foreach($_POST as $compoInform => $valorCamp) {
    //     // var_dump($valorCamp);
    //         if(empty($valorCamp)){
    //                 print "Apenas os campos AFASTAMENTO e/ou OBSERVAÇÃO podem ser vazios. Verifique!";
    //                 exit;
    //             }
    //     }
    // $masp = $_POST['masp'];
    // $adimissao = $_POST['numeroAdimissao']; 
    // $servidor = $_POST['nomeServidor'];
    // $exercicio = $_POST['exercicioServidor'];
    // $afastamento = $_POST['afastamento']; 
    // $descricao = $_POST['descricao']; 
    // $observacao = $_POST['observacao'];
 

}

//função para verificar campos vazios.
function verificarCamposNull($array) {
//todos campos que são necessario. Forma de não precisar passar valor por valor
    $camposObrigatorios = array('masp', 'numeroAdimissao', 'nomeServidor', 'exercicioServidor', 'descricao');
    //verificar se as informações recebidas tem todos os campos necessario preenchido
    foreach($array as $campo => $valor) { 
        //in_array permite que eu busque qualquer valor dentro de um array
        if(in_array($campo, $camposObrigatorios) && empty($valor)) {
            return false; 
        }
    }

    return true;
}

function selecionar() {
    $conn = new Conn;
    $select = "SELECT * FROM guia_ocorrencia"; 
    $sql = $conn->prepare($select); 
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
<div>
    <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">MASP</th>
                <th scope="col">ADIMISSÃO</th>
                <th scope="col">SERVIDOR</th>
                <th scope="col">SIT. EXERCICÍO</th>
                <th scope="col">AFASTAMENTO</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col">OBSERVAÇAO</th>
                <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Codigo funcionando 
                //Listar todas informaçoes do Banco
                $user_data = selecionar();
                foreach($user_data as $campo => $valor)   { ?>

                  <tr>
                      <td><?php print $valor['id']; ?></td>
                      <td><?php print $valor['masp_servidor']; ?></td>
                      <td><?php print $valor['adimissao']; ?></td>
                      <td><?php print $valor['nome_servidor']; ?></td>
                      <td><?php print $valor['situacao_exercicio']; ?></td>
                      <td><?php print $valor['afastamento']; ?></td>
                      <td><?php print $valor['descricao_go']; ?></td>
                      <td><?php print $valor['observacao']; ?></td>
                      <td></td>
                    <tr>
  <?php } ?>
        </tbody>
    </table>
</div>

    


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>
   
            