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
	if($system_control == 1){
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
        <menu>
            <a href="http://localhost/transluccaggi/menu.php"><img src="..\imagem/logo.png" width=20%></a>
            <h1>MATRIZ PRINCIPAL</h1><p>
            <a href="http://localhost/transluccaggi/logout.php"><img src="..\imagem/exit.png" width=3%></a>
                <table class="tableb">
                    <tr><td><a href="../saida/form_saida_motorista.php"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
                    <tr><td><a href="../saida/form_baixa_canhotos.php"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
                    <tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
                    <tr><td><a href="../saida/form_relatorio_devolucao.php"><button class="buttonb">RELATÓRIO DE DEVOLUÇÕES</button></a></td></tr>
                    <tr><td><h2>CADASTROS</h2></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                    <tr><td><h2>PESQUISAS</h2></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_nfs.php"><button>NOTAS</button></a></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_clientes.php"><button>CLIENTES</button></a></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                    <tr><td><h2>MOTORISTAS</h2></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_motoristas.php"><button>CADASTRAR</button></a></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_motoristas.php"><button>PESQUISAR</button></a></td></tr>
            </table>
        </menu>
        <rn>
            <table border=1>
                <tr><h3>NOTAS FISCAIS</h3></tr>
                <tr>
					<td><h3>NÚMERO</h3></td>
					<td><h3>SÉRIE</h3></td>
                    <td><h3>EMISSÃO</h3></td>
                    <td><h3>ENTRADA</h3></td>
                    <td><h3>VOLUMES</h3></td>
                    <td><h3>VALOR</h3></td>
                    <td><h3>PESO</h3></td>
                    <td><h3>CLIENTE</h3></td>
				</tr>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
    $dat = trim($_POST['dat']);
    $dat2 = trim($_POST['dat2']);
    $dis = trim($_POST['dis']);
#ADQUIRINDO DADOS DO BANCO
    $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cod_distribuidora` = '$dis' and `entrada` >= '$dat' and `entrada` <= '$dat2'");
#TRANSFORMANDO RESULTADO EM NÚMEROS
    $n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
    $i=0;
#APRESENTANDO REGISTROS DO BANCO
    while($i!=$n)
    {
        $vn = mysqli_fetch_array($sql); ?>
                    <tr>
                        <td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['peso'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
                    </tr>
<?php
#SOMANDO AO CONTADOR
        $i=$i+1;
    }
?>
            </table>
            <form method="post" action="imprimir_romaneio.php">
			<input type="hidden" name="dat" value="<?php echo $sat;  ?>">
			<input type="hidden" name="dat2" value="<?php echo $dat2;  ?>">
			<input type="hidden" name="dis" value="<?php echo $dis;  ?>">
			<input class="inputd" type=submit value=IMPRIMIR>
		</form>
        </rn>
    </body>
</html>
<?php
    }
}
?>