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
	if($system_control == 1 || $system_control == 2){
?>
<html>
	<head>
		<link rel="stylesheet" href="print.css" media="print"/>
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
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=80%></a>
		</exit>
		<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$not_dev = trim($_POST['not_dev']);
	$val_dev = trim($_POST['val_dev']);
	$vol_dev = trim($_POST['vol_dev']);
	$mot_dev = trim($_POST['mot_dev']);
    if(!isset($_POST['par_dev'])){
        $par_dev = "xxx";
    }else{
        $par_dev = $_POST['par_dev'];
    }
#ADQUIRINDO INFORMAÇÕES DO BANCO
    $sql = mysqli_query($conn,"SELECT * FROM $tab_dev WHERE `nota` = '$not_dev'");
	$v = mysqli_fetch_array($sql);
	$status = $v['status'];
	if($status=='AGUARDANDO'){
		?>
			<script>alert("NOTA AGUARDANDO PROTOCOLO");
					window.history.back();</script>
		<?php
	}elseif($status=='LIBERAR'){
		?>
		<script>alert("NOTA JÁ COM PROTOCOLO");
				window.history.back();</script>
		<?php
	}else{
		$sql = mysqli_query($conn,"UPDATE $tab_dev SET `nota`='$not_dev',`parcial`='$par_dev',`valor`='$val_dev',`volumes`='$vol_dev',`motivo`='$mot_dev',`status`='AGUARDANDO' WHERE `nota` = '$not_dev'");
?>
        <script>alert("NOTA REGISTRADA");</script>
		<urn>
            <table border=1>
                <h3>DEVOLUÇÕES</h3>
                <tr>
                    <td><h3>NOTA</h3></td>
                    <td><h3>NOTA PARCIAL</h3></td>
                    <td><h3>VALOR</h3></td>
                    <td><h3>VOLUMES</h3></td>
                    <td><h3>CIDADE</h3></td>
                    <td><h3>CLIENTE</h3></td>
                    <td><h3>COD_<br>CLIENTE</h3></td>
                    <td><h3>MOTIVO</h3></td>
                    <td><h3>PROTOCOLO</h3></td>
                </tr>
<?php
    $sql = mysqli_query($conn,"SELECT * FROM $tab_dev WHERE `status` = 'AGUARDANDO'");
    $n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
    $i=0;
#APRESENTANDO DADOS DA TABELA
    while($i!=$n)
    {
        $vn = mysqli_fetch_array($sql);
?>                        
                <tr>
                    <td><h4><nobr><?php echo $vn['nota'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['parcial'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['cidade'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['cliente'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['cod_cliente'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['motivo'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['protocolo'];    ?></nobr></h4></td>
                </tr>
<?php
#SOMANDO AO CONTADOR
            $i = $i + 1;
        }
?>
            </table>
        </urn>
	</body>
</html>
<?php
    }
}
}
?>