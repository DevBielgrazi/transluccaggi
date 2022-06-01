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
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
        <div class="menu">
			<img src="..\imagem/logo.png" width=15%>
			<div class="item">
				<a href="..\saida/form_saida_motorista.php"><button class="buttonb">>SAÍDA DE MOTORISTAS</button></a>
				<a href="..\saida/form_baixa_canhotos.php"><button class="buttonb">>BAIXA DE CANHOTOS</button></a>
				<a href="..\saida/form_romaneio_cargas.php"><button class="buttonb">>ROMANEIO DE CARGAS</button></a>
				<a href="..\saida/form_registro_devolucao.php"><button class="buttonb">>REGISTRO DE DEVOLUÇÕES</button></a>
				<a href="..\cadastro/cadastrar_nfs.php"><button class="buttonb2">>CADASTRO NOTAS</button></a>
				<a href="..\cadastro/cadastrar_clientes.php"><button class="buttonb2">>CADASTRO CLIENTES</button></a>
				<a href="..\cadastro/cadastrar_distribuidoras.php"><button class="buttonb2">>CADASTRO DISTRIBUIDORAS</button></a>
				<a href="..\pesquisa/form_pesquisar_nfs.php"><button class="buttonb3">>PESQUISAR NOTAS</button></a>
				<a href="..\pesquisa/form_pesquisar_clientes.php"><button class="buttonb3">>PESQUISAR CLIENTES</button></a>
				<a href="..\pesquisa/form_pesquisar_distribuidoras.php"><button class="buttonb3">>PESQUISAR DISTRIBUIDORAS</button></a>
				<a href="..\cadastro/cadastrar_motoristas.php"><button class="buttonb2">>CADASTRAR MOTORISTA</button></a>
				<a href="..\pesquisa/form_pesquisar_motoristas.php"><button class="buttonb2">>PESQUISAR MOTORISTA</button></a>
				<a href="..\financeiro/form_relatorio_diario.php"><button class="buttonb4">>RELATÓRIO DIÁRIO</button></a>
				<a href="..\financeiro/form_relatorio_mensal.php"><button class="buttonb4">>RELATÓRIO MENSAL</button></a>
				<a href="..\financeiro/form_relatorio_anual.php"><button class="buttonb4">>RELATÓRIO ANUAL</button></a>
				<a href="..\financeiro/form_frete_motoristas.php"><button class="buttonb4">>FRETE MOTORISTAS</button></a>
				<a href="..\financeiro/form_fechamento_distribuidoras.php"><button class="buttonb4">>FECHAMENTO DISTRIBUIDORAS</button></a>
				<a href="..\financeiro/form_fechamento_motoristas.php"><button class="buttonb4">>FECHAMENTO MOTORISTAS</button></a>
			</div>
		</div>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
        <rn>
<?php
#VARIÁVEIS DO FORMULÁRIO
$dat_cus = trim($_POST['dat_cus']);
$des_cus = trim($_POST['des_cus']);
$val_cus = trim($_POST['val_cus']);

$des_cus = strtolower($des_cus);

require('../connect.php');
$sql = mysqli_query($conn,"SELECT * FROM $tab_cus WHERE `mes` = '$dat_cus' AND `descricao` = '$des_cus'");
$n = mysqli_num_rows($sql);

if($n!=0){
    $sql = mysqli_query($conn,"UPDATE $tab_cus SET `valor` = '$val_cus' WHERE `mes` = '$dat_cus' AND `descricao` = '$des_cus'");
}else{
    $sql = mysqli_query($conn,"INSERT INTO $tab_cus VALUES ('$dat_cus','$des_cus','$val_cus')");
}
$sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'cus' FROM $tab_cus WHERE `mes` = '$dat_cus'");
$sql = mysqli_fetch_array($sql);
$cus_men = number_format(($sql['cus']), 2, '.', '');

?>
		<rf>
			<table border=1>
				<tr>
					<td><h3>MÊS:</h3></td>
                    <td><h4><nobr><?php echo date( 'm/Y' , strtotime($dat_cus));   ?></nobr></h4></td>
                </tr>
                <tr>
					<td><h3>DESCRIÇÃO</h3></td>
                    <td><h3>CUSTO</h3></td>
				</tr>
<?php	
    $sql = mysqli_query($conn,"SELECT * FROM $tab_cus WHERE `mes` = '$dat_cus'");
	$n = mysqli_num_rows($sql);
    $i=0;
    while($i!=$n){
        $vn = mysqli_fetch_array($sql);
?>
                <tr>
                    <td><h4><nobr><?php echo $vn['descricao'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
                </tr>
<?php
#SOMANDO AO CONTADOR
    $i = $i + 1;
    }
?>
                <tr>
					<td><h3>CUSTO TOTAL:</h3></td>
                    <td><h4><nobr><?php echo $cus_men;   ?></nobr></h4></td>
                </tr>
			</table>
        </rf>
        <pag2>
            <h1>CUSTO MENSAL</h1>
            <form method="post" action="relatorio_mensal.php">
                <input type="hidden" name="mes_rel" value="<?php echo date( 'm' , strtotime($dat_cus));?>">
                <input type="hidden" name="ano_rel" value="<?php echo date( 'Y' , strtotime($dat_cus));?>">
                <td><button class="buttond" type=submit>RELATÓRIO MENSAL</button></td>
            </form>
			<table>
                <tr>
                    <td>
                        <form method="post" action="cadastrar_custos.php">
                            <table>
                            <input type="hidden" name="dat_cus" value="<?php echo $dat_cus;?>">
                                <tr>
                                    <td><h4>DESCRIÇÃO:</h4></td>
                                    <td><input name="des_cus" type=text size=16 maxlength=16 required></td>
                                </tr>
                                <tr>
                                    <td><h4>VALOR:</h4></td>
                                    <td><input name="val_cus" type=float size=16 maxlength=8 required></td>
                                </tr>
                            </table>
                            <tr>
                                <td><input class="inputb" type=submit value=CADASTRAR></td>									
                            </tr>
                        </form>
                    </td>	
                </tr>
            </table>
        </pag2>
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