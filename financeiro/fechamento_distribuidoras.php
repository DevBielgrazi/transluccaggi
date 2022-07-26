<?php
session_start();
if(!isset($_SESSION["system_control"])){
?>
	<script>
		document.location.href="http://localhost/transluccaggi/index_financeiro.html";
	</script>
<?php
}else{
	$system_control = $_SESSION["system_control"];
	if($system_control == 2){
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
		<bar>
			<canvas width="1365" height="70" style="background-color:gray"></canvas>
		</bar>
			<div class="dropdown">
        <img onclick="myFunction()"class="dropbtn" src="..\imagem/bars.png" width="2%"></img>
            <div id="myDropdown" class="dropdown-content">
                <a href="..\saida/form_saida_motorista.php">>SAÍDA DE MOTORISTAS</a>
                <a href="..\saida/baixa_canhotos.php">>BAIXA DE CANHOTOS</a>
                <a href="..\saida/form_romaneio_cargas.php">>ROMANEIO DE CARGAS</a>
                <a href="..\saida/registro_devolucao.php">>REGISTRO DE DEVOLUÇÕES</a>
				<a href="..\saida/agendar_entrega.php">>AGENDAR ENTREGA</a>
                <a href="..\cadastro/cadastrar_nfs.php">>CADASTRO NOTAS</a>
                <a href="..\cadastro/cadastrar_clientes.php">>CADASTRO CLIENTES</a>
                <a href="..\cadastro/cadastrar_distribuidoras.php">>CADASTRO DISTRIBUIDORAS</a>
                <a href="..\pesquisa/form_pesquisar_nfs.php">>PESQUISAR NOTAS</a>
                <a href="..\pesquisa/form_pesquisar_clientes.php">>PESQUISAR CLIENTES</a>
                <a href="..\pesquisa/form_pesquisar_distribuidoras.php">>PESQUISAR DISTRIBUIDORAS</a>
                <a href="..\cadastro/cadastrar_motoristas.php">>CADASTRAR MOTORISTA</a>
                <a href="..\pesquisa/form_pesquisar_motoristas.php">>PESQUISAR MOTORISTA</a>
                <a href="form_relatorio_diario.php">>RELATÓRIO DIÁRIO</a>
                <a href="form_relatorio_mensal.php">>RELATÓRIO MENSAL</a>
                <a href="form_relatorio_anual.php">>RELATÓRIO ANUAL</a>
                <a href="form_frete_motoristas.php">>FRETE MOTORISTAS</a>
                <a href="form_fechamento_distribuidoras.php">>FECHAMENTO DISTRIBUIDORAS</a>
                <a href="form_fechamento_motoristas.php">>FECHAMENTO MOTORISTAS</a>
            </div>
        </div>
        <script>
            function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
            }

            window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                }
            }
            }
        </script>
        <back>
        	<a href="form_fechamento_distribuidoras.php"><img src="..\imagem/back.png" width=20%></a>
        </back>
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
        <rn>
<?php
#VARIÁVEIS DO FORMULÁRIO
$ano_fec = trim($_POST['ano_fec']);
$mes_fec= trim($_POST['mes_fec']);
$dis_fec= trim($_POST['dis_fec']);

$dat_fec = $ano_fec."-".$mes_fec."-01";
$dat_fec2 = $ano_fec."-".$mes_fec."-31";

require('../connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO
if($dis_fec>1){
    $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$dis_fec' AND `entrada` >= '$dat_fec' AND `entrada` <= '$dat_fec2'");
}
else{
    $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `cod_distribuidora` = '$dis_fec' AND `emissao` >= '$dat_fec' AND `emissao` <= '$dat_fec2'");
}
$sql = mysqli_fetch_array($sql);
#VARIÁVEL DO BANCO
$val_mes = number_format(($sql['val']), 2, '.', '');

$sql2 = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `codigo` = '$dis_fec'");
$sql2 = mysqli_fetch_array($sql2);
#VARIÁVEL DO BANCO
$nom_dis = $sql2['nome'];
?>
		<rf>
			<table class="tableb" border=1>
				<h1>FECHAMENTO DISTRIBUIDORAS</h1>
				<tr>
					<th><h3>DATA</h3></th>
					<th><h3>DISTRIBUIDORA</h3></th>
					<th><h3>VALOR</h3></th>
				</tr>
                <tr>
					<td><h4><nobr><?php echo $mes_fec."/".$ano_fec;   ?><nobr></h4></td>
					<td><h4><nobr><?php echo $nom_dis;    ?><nobr></h4></td>
					<td><h4><nobr><?php echo "R$".$val_mes;    ?><nobr></h4></td>
				</tr>
			</table>
</rf>
	</body>
</html>
<?php
    }
    
    else
    {
?>
	<script>
		document.location.href="http://localhost/transluccaggi/financeiro/index_financeiro.html";
	</script>
<?php
    }
}
?>