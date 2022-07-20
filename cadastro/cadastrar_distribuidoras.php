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
		require('../connect.php');
?>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
		<div class="dropdown">
        <img onclick="myFunction()"class="dropbtn" src="..\imagem/bars.png" width="2%"></img>
            <div id="myDropdown" class="dropdown-content">
                <a href="..\saida/form_saida_motorista.php">>SAÍDA DE MOTORISTAS</a>
                <a href="..\saida/baixa_canhotos.php">>BAIXA DE CANHOTOS</a>
                <a href="..\saida/form_romaneio_cargas.php">>ROMANEIO DE CARGAS</a>
                <a href="..\saida/registro_devolucao.php">>REGISTRO DE DEVOLUÇÕES</a>
				<a href="..\saida/agendar_entrega.php">>AGENDAR ENTREGA</a>
                <a href="cadastrar_nfs.php">>CADASTRO NOTAS</a>
                <a href="cadastrar_clientes.php">>CADASTRO CLIENTES</a>
                <a href="cadastrar_distribuidoras.php">>CADASTRO DISTRIBUIDORAS</a>
                <a href="..\pesquisa/form_pesquisar_nfs.php">>PESQUISAR NOTAS</a>
                <a href="..\pesquisa/form_pesquisar_clientes.php">>PESQUISAR CLIENTES</a>
                <a href="..\pesquisa/form_pesquisar_distribuidoras.php">>PESQUISAR DISTRIBUIDORAS</a>
                <a href="cadastrar_motoristas.php">>CADASTRAR MOTORISTA</a>
                <a href="..\pesquisa/form_pesquisar_motoristas.php">>PESQUISAR MOTORISTA</a>
                <a href="..\financeiro/form_relatorio_diario.php">>RELATÓRIO DIÁRIO</a>
                <a href="..\financeiro/form_relatorio_mensal.php">>RELATÓRIO MENSAL</a>
                <a href="..\financeiro/form_relatorio_anual.php">>RELATÓRIO ANUAL</a>
                <a href="..\financeiro/form_frete_motoristas.php">>FRETE MOTORISTAS</a>
                <a href="..\financeiro/form_fechamento_distribuidoras.php">>FECHAMENTO DISTRIBUIDORAS</a>
                <a href="..\financeiro/form_fechamento_motoristas.php">>FECHAMENTO MOTORISTAS</a>
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
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
<?php
	if(!isset($_POST['nom_dis'])){
?>
		<pag>
			<h1>CADASTRAR DISTRIBUIDORAS</h1><p>
			<table>
					<tr>
						<td>
							<form method="post" action="cadastrar_distribuidoras.php">
								<table>
									<tr>
										<td><h4>NOME:</h4></td>
										<td><input autocomplete="off" name="nom_dis" type=text size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>PORCENTAGEM:</h4></td>
										<td><input autocomplete="off" name="por_dis" type=float size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>CADASTRO:</h4></td>
										<td><input autocomplete="off" name="cad_dis" type=date required></td>
									</tr>																									 
								</table>
								<tr>
									<td><input autocomplete="off" class="inputb" type=submit value=CADASTRAR></td>									
								</tr>
							</form>
						</td>	
					</tr>
				</table>
		</pag>
<?php
	}else{
		?>
		<pag>
			<h1>CADASTRAR DISTRIBUIDORAS</h1><p>
			<table>
					<tr>
						<td>
							<form method="post" action="cadastrar_distribuidoras.php">
								<table>
									<tr>
										<td><h4>NOME:</h4></td>
										<td><input autocomplete="off" name="nom_dis" type=text size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>PORCENTAGEM:</h4></td>
										<td><input autocomplete="off" name="por_dis" type=float size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>CADASTRO:</h4></td>
										<td><input autocomplete="off" name="cad_dis" type=date required></td>
									</tr>																									 
								</table>
								<tr>
									<td><input autocomplete="off" class="inputb" type=submit value=CADASTRAR></td>									
								</tr>
							</form>
						</td>	
					</tr>
				</table>
		</pag>
<?php
#VARIÁVEIS DO FORMULÁRIO
    $nom_dis = trim($_POST['nom_dis']);
    $por_dis = trim($_POST['por_dis']);
    $cad_dis = trim($_POST['cad_dis']);
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `nome` = '$nom_dis'");
#TRANSFORMANDO RESULTADO EM NUMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
	if($n != 0){
?>
			<script>alert("DISTRIBUIDORA JÁ CADASTRADA!");</script>
<?php
	}
	else
	{
#INSERINDO DADOS NA TABELA
		$sql = mysqli_query($conn,"INSERT INTO $tab_dis(`nome`, `porcentagem`, `cadastro`) VALUES ('$nom_dis', '$por_dis', '$cad_dis')");
?>
			<script>alert("DISTRIBUIDORA CADASTRADA COM SUCESSO!");</script>
<?php
	}
}
?>
		<urd>
			<table border=1>
				<h3>DISTRIBUIDORAS CADASTRADAS</h3>
				<tr>
					<td><h3>EXCLUIR</h3></td>
					<td><h3>EDITAR</h3></td>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>NOME</h3></td>
					<td><h3>CADASTRO</h3></td>
				</tr>
<?php
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis ORDER BY `codigo` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO DADOS DA TABELA
	while($i<$n){
#CADASTROS POR COLUNA
		$vn = mysqli_fetch_array($sql);	?>
				<tr>
					<form method="post" action="..\excluir/resultado_excluir_distribuidoras.php">
                		<input autocomplete="off" type="hidden" name="cod_dis" value="<?php echo $vn['codigo'];?>">
                    <td><nobr><input autocomplete="off" class="inpute" width="40" type="image" src="..\imagem/delete.png" alt="submit"></td>
            		</form>
            		<form method="post" action="..\alterar/resultado_alterar_distribuidoras.php">
                		<input autocomplete="off" type="hidden" name="cod_dis" value="<?php echo $vn['codigo'];?>">
                    <td><input autocomplete="off" class="inpute" width="40" type="image" src="..\imagem/alter.png" alt="submit"></nobr></td>
					</form>
					<td><h4><nobr><?php echo $vn['codigo'];   ?><nobr></h4></td>
					<td><h4><nobr><?php echo $vn['nome'];    ?><nobr></h4></td>
					<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?><nobr></h4></td>
				</tr>
<?php
#SOMANDO AO CONTADOR
		$i = $i + 1;
	}
?>
			</table>
		</urd>
	</body>
</html>
<?php
    }
}
?>