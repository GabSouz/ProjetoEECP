<?php

require "Class/Conn.php";
require "Class/Crud.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</body>
</html>

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
?>
   
            