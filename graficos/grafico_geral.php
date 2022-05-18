<?php
#incluindo a classe. verifique se diretorio e versao sao iguais, altere se precisar
include('phplot-6.2.0/phplot.php');

function frete($dat_rel,$dat_rel2){
    require('../connect.php');
    $sql = mysqli_query($conn,"SELECT * FROM $tab_dis");
    $n = mysqli_num_rows($sql);

    $fre_disg = 0;
    for($i=1; $i<$n; $i++){
        require('../connect.php');
        $sql = mysqli_query($conn,"SELECT `porcentagem` as 'por' FROM $tab_dis WHERE `codigo` = '$i'");
        $sql = mysqli_fetch_array($sql);
        $por = (float) $sql['por'];
        if($i==1){
            $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$i' AND `emissao` >= '$dat_rel' AND `emissao` <= '$dat_rel2'");
        }
        else{
            $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$i' AND `entrada` >= '$dat_rel' AND `entrada` <= '$dat_rel2'");
        }
        $sql = mysqli_fetch_array($sql);
        $val_mer = (float) $sql['val'];
        $fre_dis = ($por * $val_mer)/100;
        $fre_disg = $fre_disg+$fre_dis;
    }
    $fre_disg = number_format(($fre_disg), 2, '.', '');
    return $fre_disg;
}

function custo($dat_rel,$dat_rel2){
    require('../connect.php');
    $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'fre' FROM $tab_fre WHERE `data` >= '$dat_rel' AND `data` <= '$dat_rel2'");
    $sql = mysqli_fetch_array($sql);
    $fre_mot = number_format(($sql['fre']), 2, '.', '');
    $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'cus' FROM $tab_cus WHERE `mes` >= '$dat_rel' AND `mes` <= '$dat_rel2'");
    $sql = mysqli_fetch_array($sql);
    $cus_men = number_format(($sql['cus']), 2, '.', '');
    $cus_men = $cus_men+$fre_mot;
    return $cus_men;
}

function saldo($fre_disg,$cus_men){
    $sal_men = $fre_disg - $cus_men;
    $sal_men = number_format(($sal_men), 2, '.', '');

    return $sal_men;
}

#Matriz utilizada para gerar os graficos
$data = [];
$dat_rel = $_POST['dat_rel'];
$ano_rel = date('Y', strtotime($dat_rel))-9;
for($i=0;$i<10;$i++){        
    $data[] = array($ano_rel,saldo(frete($ano_rel."-01-01",$ano_rel."-12-31"),custo($ano_rel."-01-01",$ano_rel."-12-31")), frete($ano_rel."-01-01",$ano_rel."-12-31"),custo($ano_rel."-01-01",$ano_rel."-12-31"));
    $ano_rel = $ano_rel+1;
}

#Instancia o objeto e setando o tamanho do grafico na tela
$plot = new PHPlot(1000,600);
#Tipo de borda, consulte a documentacao
$plot->SetImageBorderType("raised");

#Tipo de grafico, nesse caso barras, existem diversos(pizza…)
$plot->SetPlotType("linepoints");

#Tipo de dados, nesse caso texto que esta no array
$plot->SetDataType("text-data");

#Setando os valores com os dados do array
$plot->SetDataValues($data);

#Titulo do grafico
$plot->SetTitle("ULTIMOS 10 ANOS");

#Legenda, nesse caso serao tres pq o array possui 3 valores que serao apresentados
$plot->SetLegend(array("SALDO","FRETE","CUSTO"));

#Utilizados p/ marcar labels, necessario mas nao se aplica neste ex. (manual) :
$plot->SetXTickLabelPos("none");
$plot->SetXTickPos("none");

#Gera o grafico na tela
$plot->DrawGraph();

?>