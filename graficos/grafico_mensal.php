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

function custo_mensal($dat_rel,$dat_rel2){
    require('../connect.php');
    $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'cus' FROM $tab_cus WHERE `mes` >= '$dat_rel' AND `mes` <= '$dat_rel2'");
    $sql = mysqli_fetch_array($sql);
    $custo = number_format(($sql['cus']), 2, '.', '');
    $custo = ($custo/31);
    return $custo;
}

function custo($dat_rel,$dat_rel2,$custo){
    require('../connect.php');
    $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'fre' FROM $tab_fre WHERE `data` >= '$dat_rel' AND `data` <= '$dat_rel2'");
    $sql = mysqli_fetch_array($sql);
    $fre_mot = number_format(($sql['fre']), 2, '.', '');
    $cus_men = $custo+$fre_mot;
    $cus_men = number_format(($cus_men), 2, '.', '');
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
$ano_rel = date('Y', strtotime( $dat_rel));
$m = date('m', strtotime( $dat_rel));
$c = $m-1;
$mes_rel = [
    1 => "Janeiro",
    2 => "Fevereiro",
    3 => "Marco",
    4 => "Abril",
    5 => "Maio",
    6 => "Junho",
    7 => "Julho",
    8 => "Agosto",
    9 => "Setembro",
    10 => "Outubro",
    11 => "Novembro",
    12 => "Dezembro",
    ];

for($i=1;$i<=31;$i++){        
    $data[] = array($i,saldo(frete($ano_rel."-".$m."-".$i,$ano_rel."-".$m."-".$i),custo($ano_rel."-".$m."-".$i,$ano_rel."-".$m."-".$i,custo_mensal($ano_rel."-0".$c."-01",$ano_rel."-0".$c."-01"))), frete($ano_rel."-".$m."-".$i,$ano_rel."-".$m."-".$i),custo($ano_rel."-".$m."-".$i,$ano_rel."-".$m."-".$i,custo_mensal($ano_rel."-0".$c."-01",$ano_rel."-0".$c."-01")));
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
$m = ltrim($m, "0");
$plot->SetTitle($mes_rel[$m]);

#Legenda, nesse caso serao tres pq o array possui 3 valores que serao apresentados
$plot->SetLegend(array("SALDO","FRETE","CUSTO PASSADO"));

#Utilizados p/ marcar labels, necessario mas nao se aplica neste ex. (manual) :
$plot->SetXTickLabelPos("none");
$plot->SetXTickPos("none");

#Gera o grafico na tela
$plot->DrawGraph();

?>