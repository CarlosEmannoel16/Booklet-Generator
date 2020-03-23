<?php
date_default_timezone_set('UTC');   
if(isset($_POST['nome']) || isset($_POST['qua_parc']) || isset($_POST['valor'])){
    $nameBuyer = addslashes($_POST['nome']);
    $address = addslashes($_POST['ender']);
    $city = addslashes($_POST['cidade']);
    $quantityP = addslashes($_POST['qua_parc'])   ;
    $valuePay = addslashes($_POST['valor']);
    $expirationDay = $_POST['data'];
    $nameSeller = addslashes($_POST['nomeV']);
    $locationPay = addslashes($_POST['localP']);
    $observation = addslashes($_POST['obs']);
    $phone = addslashes($_POST['tell']);

    $valuePay = number_format($valuePay, 2, ',', '.');
    $expirationDay = explode('-', $expirationDay);

    $month = $expirationDay[1];
    $dayConstant = $expirationDay[2];
    $year =  $expirationDay[0];      

    define('Expiration', $dayConstant);

    $nameFile = "Carne.xls";

    /*Configurações header para forçar o download*/
    
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
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$nameFile}\"" );
header ("Content-Description: PHP Generated Data" );

    /**Loop contador de parcelas */
for( $i = 1; $i <= $quantityP; $i++){ 
    
    $day = Expiration;
    $month++;            
    if($month > 12){
        $month = 1;
        $year++;
    }
    

    $yearBi = ($year/4);
// /**Caso ano for Bi */
    
     if (is_int($yearBi) == false){
         if(($day > 28) && ($month == 2) ){
             $day = 3;
         }
     }
    
 /**Caso o dia não existir */
    if($day == 31){
        if($month == 4 || $month == 6 || $month == 9 || $month == 11) {
             $day = 2;
        }  
    }
    $html = '
             <style>
                 .tituloTabela{
                         font-size:23pt;
                         text-align:center;
                         border-top:1px solid #a0a0a0;
                  }
                 .subtitulo{
                         font-size:11pt;
                         text-align:center;
                 }
                 td{
                         text-align:left;
                 }
            
                 .borderRight{
                    border-bottom:1px solid #a0a0a0;
    
                 }
            
                 .borderUp{
                     border-style:solid;
                     border-bottom-width:1px;
                     border-color:#0a0a0a;
                 }
                 .borderCenter{
                    border-bottom:1px solid #a0a0a0;
                    border-right:1px solid #a0a0a0;
                 }
                 .borderRightLef{
                    border-right:1px solid #a0a0a0;
                    border-left:1px solid #a0a0a0;
                 }

                .smallTitle{
                      font-size:10pt;
                }
                .borderLeft{
                    border-right:1px dotted #a0a0a0;
                    border-bottom:1px solid #a0a0a0;
                }
                .pont{
                    border-right: 1px dotted #a0a0a0;
                }
                



             </style>

             <table>
                     <tr>
                         <td colspan="3" class="pont" class="tituloTabela"></td>
                         <td class="tituloTabela" colspan="10">Carnê de Pagamento</td>

                     </tr>
                     <tr>
                          <td colspan="3" class="pont"></td>
                          <td class="subtitulo" colspan="11" >Rua João Francelino Cariús, Distrito de Caipu - Loja Bc Variedades</td>
                     </tr>
                     <tr>
                          <td colspan="3"  ></td>
                          <td colspan="10" class="subtitulo"  > Cell: '.$phone.'</td>
                     </tr>
                     <tr>
                          <td colspan="3" class="smallTitle" > Vencimento: </td>
                          <td colspan="7"  class="smallTitle borderRightLef" > Local de Pagamento:  </td>
                          <td colspan="3"  class="borderRight smallTitle"> Vencimento: </td>
                     </tr>
                     <tr>
                         <td colspan="3"  class="borderLeft" >'.$day.' / '.$month.' / '.$year.'</td>
                         <td colspan="7" class="borderCenter" >'.$locationPay.'</td>
                         <td colspan="3"  class="borderRight">'.$day.' / '.$month.' / '.$year.'</td>
                     </tr>
                     <tr>
                         <td colspan="3"  class="smallTitle "> (=) Valor do Documento: </td>
                         <td colspan="7" class="smallTitle borderRightLef" >Nome/cliente:</td>
                         <td colspan="3"  class="">(=)Valor do Documento: </td>
                     </tr>
                     <tr>
                         <td colspan="3"  class="borderLeft" >R$: '.$valuePay.' </td>
                         <td colspan="7"  class="borderCenter">'.$nameBuyer.'</td>
                         <td colspan="3"  class="borderRight">R$: '.$valuePay.'</td>
                     </tr>
                     <tr>
                         <td colspan="3" class="smallTitle ">   Nº Parcela/Total Parc:  </td>
                         <td colspan="7" class="smallTitle borderRightLef">  Endereço/cliente:</td>
                         <td colspan="3" class="smallTitle ">    Nº Parcela/Total Parc: </td>
                     </tr>
                     <tr>
                         <td colspan="3" class="borderLeft" >'.$i.' // '.$quantityP.'</td>
                         <td colspan="7" class="borderCenter">'.$address.' '.$city.'Caipu</td>
                         <td colspan="3" class="borderRight">'.$i.' // '.$quantityP.'</td>
                     </tr>
                     <tr>
                         <td colspan="3" class="smallTitle">   (=)Valor Pago:    </td>
                         <td colspan="7" classs="smallTitle borderRightLef">  Observações:     </td>
                         <td colspan="3"  class=" smallTitle borderRight2"> (=) Valor Pago:    </td>
                     </tr>
                     <tr>
                         <td colspan="3"  class="borderLeft ">   Visto do Responsável     </td>
                         <td colspan="7" rowspan="2"  class="borderCenter">'.$observation.'</td>
                         <td colspan="3" class="borderRight">     Visto do Responsável  </td>
                     </tr>
                     <tr>
                         <td colspan="3" class="borderLeft">Pago em ___/___/___ </td>
                         <td colspan="3" class="borderRight">Pago em ___/___/___</td>
                     </tr>

             </table> <br>';
             echo $html;
    }    

// Envia o conteúdo do arquivo

exit; 
}
      ?>
    
</body>
</html>