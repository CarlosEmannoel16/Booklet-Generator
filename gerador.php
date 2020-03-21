<?php
include('funcoes/pegar.php');    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Asap&display=swap" rel="stylesheet">     <link rel="stylesheet" href="css/gerador.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="todo"> 
        <div class="opcoes">
            <form action="gerador.php" method="post" class="formulario">
                <div class="esq">   
                    <h1 class="titulo">Dados Pessoais</h1>
                    <label for="">Nome do Cliente</label> <br>
                    <input type="text" name="nome" required> <br>
                    <label for="">Endereço</label> <br>
                    <input type="text"  name="ender"> <br>
                    <label for="text" >Cidade</label> <br>
                    <input type="text" name="cidade" required> <br>
                    <label for="">Observações</label> <br>
                    <input type="text" name="obs">
                    <input type="submit" name="Gerar" value="Gerar" class="btn">
                        
                </div>
                <div class="dir">
                    <h1 class="titulo">Contrato</h1>
                    <label for="" >Quant Parcelas</label> <br>
                    <input type="number" name="qua_parc" requered> <br>
                    <label for="">Valor da Parcela</label> <br>
                    <input type="number" name="valor" requered> <br>
                    <label for="">Vencimento</label> <br>
                    <input type="date" name="data" requered> <br>
                    <label for="">Nomde do Vendedor</label> <br>
                    <input type="text" name="nomeV"> <br>
                    <label for="">Local de Pagamento</label> <br>
                    <input type="text" name="localP"> <br>
                    <label for="">Telefone do Cedente</label>
                    <input type="tell" name="tell">

                    

                </div>
            </form> 
        </div>
    </div>
</body>
</html>