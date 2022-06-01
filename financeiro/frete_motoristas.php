<?php
session_start();
if(!isset($_SESSION["system_control"])){
?>
	<script>
		document.location.href="http://localhost/transluccaggi/index.html";
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
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('..\connect.php');
#VARIÁVEIS DO FORMULÁRIO
    $mot_fre = trim($_POST['mot_fre']);
    $dat_fre = trim($_POST['dat_fre']);
    $val_fre = trim($_POST['val_fre']);
    $sai_fre = 1;
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_fre WHERE `data` = '$dat_fre' AND `motorista` = '$mot_fre'");
#TRANSFORMANDO RESULTADO EM NUMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
	if($n != 0){
        $vn = mysqli_fetch_array($sql);
        $sai_frea = $vn['saidas'];
        $sai_fre = $sai_fre+$sai_frea;
        $sql = mysqli_query($conn,"UPDATE $tab_fre SET `valor` = '$val_fre', `saidas` = '$sai_fre' WHERE `data` = '$dat_fre' AND `motorista` = '$mot_fre'");
	}else{
		$sql2 = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$mot_fre'");
		$vn = mysqli_fetch_array($sql2);
		$id_mot = $vn['id'];
		$sql = mysqli_query($conn,"INSERT INTO $tab_fre(`data`, `id_motorista`, `motorista`, `valor`, `saidas`) VALUES ('$dat_fre', '$id_mot', '$mot_fre', '$val_fre', '$sai_fre')");
	}
?>
		<pag>
			<table border=1>
				<h1>FRETE POR MOTORISTAS</h1>
				<tr>
					<td><h3>DATA</h3></td>
					<td><h3>MOTORISTA</h3></td>
					<td><h3>VALOR</h3></td>
				</tr>
                <tr>
					<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime($dat_fre));   ?><nobr></h4></td>
					<td><h4><nobr><?php echo $mot_fre;    ?><nobr></h4></td>
					<td><h4><nobr><?php echo "R$".$val_fre;    ?><nobr></h4></td>
				</tr>
			</table>
</pag>
	</body>
</html>
<?php
    }
    else{
?>
        <script>
            document.location.href="http://localhost/transluccaggi/financeiro/index_financeiro.html";
        </script>
<?php
    }
}
?>