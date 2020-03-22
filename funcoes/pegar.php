<?php

if( isset($_POST['nome']) || isset($_POST['qua_parc']) || isset($_POST['valor'])){
    $nome = addslashes($_POST['nome']);
    $cpf =  addslashes($_POST['cpf']);
    $ender = addslashes($_POST['ender']);
    $cidade = addslashes($_POST['cidade']);
    $quant_par = addslashes($_POST['qua_parc'])   ;
    $valor = addslashes($_POST['valor']);
    $data = addslashes($_POST['data']);
    $nomeVen = addslashes($_POST['nomeV']);
    $localP = addslashes($_POST['localP']);
    $obs = addslashes($_POST['obs']);
    $tell = addslashes($_POST['tell']);

    $valor = number_format($valor, 2, ',', '.');

    $data = explode("-",$data);
    constant( $dia = $data[0];
    $mes = $data[1];
    $ano = $data[2];      
   $Nome_arquivo = "Carne.xls";

    // Configurações header para forçar o download
    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=\"{$Nome_arquivo}\"" );
    header ("Content-Description: PHP Generated Data" );
?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
    <body>
<?php
    /**Loop contador de parcelas */
for( $i = 1; $i <= $quant_par; $i++){             
    $mes++;

    if($mes > 12  ){
        $mes = 1;
        $ano++;
     }
/**Caso ano for Bi */
    $anoB = $ano/4;
    if (is_int($anoB)){
        if($dia == 29 && $mes == 2){
            $dia = 1;
        }
    }
/**Caso o dia não existir */
    if($dia == 31){
        switch($mes){
            case 4:
                $dia = 1;
                break;
            case 6:
                $dia = 1;
                break;
            case 9:
            $dia = 1;
                break;
            case 11:
                 $dia = 1;
            break;
        }
    }
   

    $html = '
             <style>
                 .tituloTabela{
                         font-size:23pt;
                         text-align:left;
                  }
                 .subtitulo{
                         font-size:12pt;
                         text-align:left;
                 }
                 td{
                         text-align:left;
                 }
                 .subs{
                         font-weight:900;
                 }
                 table{
                         font-family:calibri;
                         font-size:11pt;
                 }
                 .pont{
                         border-right:4px dotted black;
                 }
                 .bo1{
                         border:1px solid black;
                 }
                 .bo2{
                         border-top:1px solid black;
                         border-bottom:1px solid black;
                 }
                 .bo3{
                         border-top:1px solid black;
                         border-bottom:1px solid black;
                 }


             </style>

             <table>
                     <tr>
                         <td colspan="4" class="pont"></td>
                         <td class="tituloTabela" colspan="11">Carnê de Pagamento</td>

                     </tr>
                     <tr>
                          <td colspan="4" class="pont"></td>
                          <td class="subtitulo" colspan="11"  >Sistema CarneMania by:Carlos.E</td>
                     </tr>
                     <tr>
                          <td colspan="4" class="pont"></td>
                          <td colspan="11" class="subtitulo">'.$tell.'</td>
                     </tr>
                     <tr>
                          <td colspan="4"  class="subs" class="pont">Vencimento:</td>
                          <td colspan ="7" class="subs" class="bo2">Local de Pagamento:</td>
                          <td colspan="4" class="subs" class="bo1">Vencimento:</td>
                     </tr>
                     <tr>
                         <td colspan="4" class="pont" >'.date("d-m-y",mktime(0,0,0,$mes,$dia,$ano)).'</td>
                         <td colspan="7"  class="bo2">'.$localP.'</td>
                         <td colspan="4" class="bo1"></td>
                     </tr>
                     <tr>
                         <td colspan="4" class="subs" class="pont" >(=) Valor do Documento:</td>
                         <td colspan="7" class="subs"  class="bo2">Nome/cliente:</td>
                         <td colspan="4" class="subs" class="bo1">(=)Valor do Documento:</td>
                     </tr>
                     <tr>
                         <td colspan="4" class="pont" >'.$valor.' </td>
                         <td colspan="7"  class="bo2">'.$nomeVen.'</td>
                         <td colspan="4" class="bo1">'.$valor.'</td>
                     </tr>
                     <tr>
                         <td colspan="4" class="subs" class="pont">Nº Parcela/Total:</td>
                         <td colspan="7" class="subs"  class="bo2">Endereço/cliente:</td>
                         <td colspan="4" class="subs" class="bo1">Nº Parcela/Total:</td>
                     </tr>
                     <tr>
                         <td colspan="4" class="pont" >'.$i.' | '.$quant_par.'</td>
                         <td colspan="7"  class="bo2">Rua João Farncelino 98 Caipu</td>
                         <td colspan="4" class="bo1">'.$i.' | '.$quant_par.'</td>
                     </tr>
                     <tr>
                         <td colspan="4" class="subs" class="pont" >Valor Pago</td>
                         <td colspan="7" class="subs"  class="bo2">Observações</td>
                         <td colspan="4" class="subs" class="bo1">Valor Pago:</td>
                     </tr>
                     <tr>
                         <td colspan="4" class="subs" class="pont" >Visto do Responsável</td>
                         <td colspan="7" rowspan="2"  class="bo2">'.$obs.'</td>
                         <td colspan="4" class="subs"  class="subs" class="bo1">Visto do Responsável</td>
                     </tr>
                     <tr>
                         <td colspan="4" class="pont">Pago em ___/___/___ </td>
                         <td colspan="4" class="bo1">Pago em ___/___/___</td>
                     </tr>

             </table> <br>';
        echo $html;
    }
            exit;    
}
      ?>
    
</body>
</html>