<?php
#incluindo a classe. verifique se diretorio e versao sao iguais, altere se precisar
include('phplot-6.2.0/phplot.php');

function custos($dat_rel){
    require('../connect.php');
    $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_cus WHERE `mes` = '$dat_rel'");
    $sql = mysqli_fetch_array($sql);
    $val_cus = (float) $sql['val'];
    $val_cus = number_format(($val_cus), 2, '.', '');
    return $val_cus;
}

#Matriz utilizada para gerar os graficos
$data = [];
$descricoes = [];
$dat_rel = $_POST['dat_cus'];
$ano_rel = date('Y', strtotime( $dat_rel));
$mes_rel = [
1 => "Jan",
2 => "Fev",
3 => "Mar",
4 => "Abr",
5 => "Mai",
6 => "Jun",
7 => "Jul",
8 => "Ago",
9 => "Set",
10 => "Out",
11 => "Nov",
12 => "Dez",
];

for($i=1;$i<=12;$i++){        
    $data[] = array($mes_rel[$i],custos($ano_rel."-".$i."-01"));
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
$plot->SetTitle("Custos mensais ".$ano_rel);

#Legenda, nesse caso serao tres pq o array possui 3 valores que serao apresentados
#$plot->SetLegend(array(""));

#Utilizados p/ marcar labels, necessario mas nao se aplica neste ex. (manual) :
$plot->SetXTickLabelPos("none");
$plot->SetXTickPos("none");

#Gera o grafico na tela
$plot->DrawGraph();

?>