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
<!DOCTYPE html>
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
	if(!isset($_POST['cad_mot'])){
?>
	<pag>
			<h1>CADASTRAR MOTORISTAS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="cadastrar_motoristas.php">
							<table>
								<tr>
									<td><h4>CADASTRO:</h4></td>
									<td><input autocomplete="off" name="cad_mot" type=date required></td>
								</tr>
								<tr>
									<td><h4>NOME:</h4></td>
									<td><input autocomplete="off" name="nom_mot" type=text size=16 maxlength=32 required></td>
								</tr>
                                <tr>
									<td><h4>VEÍCULO:</h4></td>
									<td><input autocomplete="off" name="vei_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>PLACA:</h4></td>
									<td><input autocomplete="off" name="pla_mot" type=text size=16 maxlength=8 required></td>
								</tr>
                                <tr>
									<td><h4>TELEFONE:</h4></td>
									<td><input autocomplete="off" name="tel_mot" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>ENDEREÇO:</h4></td>
									<td><input autocomplete="off" name="end_mot" type=text size=16 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>CPF:</h4></td>
									<td><input autocomplete="off" name="cpf_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>RG:</h4></td>
									<td><input autocomplete="off" name="rg_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>NASCIMENTO:</h4></td>
									<td><input autocomplete="off" name="nas_mot" type=date required></td>
								</tr>
								<tr>
									<td><h4>NATURALIDADE:</h4></td>
									<td><input autocomplete="off" name="nat_mot" type=text size=16 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>CNH:</h4></td>
									<td><input autocomplete="off" name="cnh_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>VALIDADE(CNH):</h4></td>
									<td><input autocomplete="off" name="val_mot" type=date required></td>
								</tr>
								<tr>
									<td><h4>CATEGORIA(CNH):</h4></td>
									<td><input autocomplete="off" name="cat_mot" type=text size=16 maxlength=4 required></td>
								</tr>
								<tr>
									<td><h4>CEP:</h4></td>
									<td><input autocomplete="off" name="cep_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>BANCO:</h4></td>
									<td><input autocomplete="off" name="ban_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO BANCO:</h4></td>
									<td><input autocomplete="off" name="cod_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>AGÊNCIA BANCO:</h4></td>
									<td><input autocomplete="off" name="age_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>CONTA BANCO:</h4></td>
									<td><input autocomplete="off" name="con_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>ANO VEÍCULO:</h4></td>
									<td><input autocomplete="off" name="ano_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>COR VEÍCULO:</h4></td>
									<td><input autocomplete="off" name="cor_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>RENAVAM:</h4></td>
									<td><input autocomplete="off" name="ren_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>NÚMERO CHASSI:</h4></td>
									<td><input autocomplete="off" name="num_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>ANTT:</h4></td>
									<td><input autocomplete="off" name="ant_mot" type=text size=16 maxlength=16></td>
								</tr>
								<tr>
									<td><h4>CATEGORIA ANTT:</h4></td>
									<td><input autocomplete="off" name="caa_mot" type=text size=16 maxlength=16></td>
								</tr>
								<tr>
									<td><h4>VALIDADE ANTT:</h4></td>
									<td><input autocomplete="off" name="vaa_mot" type=date></td>
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
		<h1>CADASTRAR MOTORISTAS</h1><p>
		<table>
			<tr>
				<td>
					<form method="post" action="cadastrar_motoristas.php">
						<table>
							<tr>
								<td><h4>CADASTRO:</h4></td>
								<td><input autocomplete="off" name="cad_mot" type=date required></td>
							</tr>
							<tr>
								<td><h4>NOME:</h4></td>
								<td><input autocomplete="off" name="nom_mot" type=text size=16 maxlength=32 required></td>
							</tr>
							<tr>
								<td><h4>VEÍCULO:</h4></td>
								<td><input autocomplete="off" name="vei_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>PLACA:</h4></td>
								<td><input autocomplete="off" name="pla_mot" type=text size=16 maxlength=8 required></td>
							</tr>
							<tr>
								<td><h4>TELEFONE:</h4></td>
								<td><input autocomplete="off" name="tel_mot" type=int size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>ENDEREÇO:</h4></td>
								<td><input autocomplete="off" name="end_mot" type=text size=16 maxlength=64 required></td>
							</tr>
							<tr>
								<td><h4>CPF:</h4></td>
								<td><input autocomplete="off" name="cpf_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>RG:</h4></td>
								<td><input autocomplete="off" name="rg_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>NASCIMENTO:</h4></td>
								<td><input autocomplete="off" name="nas_mot" type=date required></td>
							</tr>
							<tr>
								<td><h4>NATURALIDADE:</h4></td>
								<td><input autocomplete="off" name="nat_mot" type=text size=16 maxlength=32 required></td>
							</tr>
							<tr>
								<td><h4>CNH:</h4></td>
								<td><input autocomplete="off" name="cnh_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>VALIDADE(CNH):</h4></td>
								<td><input autocomplete="off" name="val_mot" type=date required></td>
							</tr>
							<tr>
								<td><h4>CATEGORIA(CNH):</h4></td>
								<td><input autocomplete="off" name="cat_mot" type=text size=16 maxlength=4 required></td>
							</tr>
							<tr>
								<td><h4>CEP:</h4></td>
								<td><input autocomplete="off" name="cep_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>BANCO:</h4></td>
								<td><input autocomplete="off" name="ban_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>CÓDIGO BANCO:</h4></td>
								<td><input autocomplete="off" name="cod_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>AGÊNCIA BANCO:</h4></td>
								<td><input autocomplete="off" name="age_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>CONTA BANCO:</h4></td>
								<td><input autocomplete="off" name="con_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>ANO VEÍCULO:</h4></td>
								<td><input autocomplete="off" name="ano_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>COR VEÍCULO:</h4></td>
								<td><input autocomplete="off" name="cor_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>RENAVAM:</h4></td>
								<td><input autocomplete="off" name="ren_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>NÚMERO CHASSI:</h4></td>
								<td><input autocomplete="off" name="num_mot" type=text size=16 maxlength=16 required></td>
							</tr>
							<tr>
								<td><h4>ANTT:</h4></td>
								<td><input autocomplete="off" name="ant_mot" type=text size=16 maxlength=16></td>
							</tr>
							<tr>
								<td><h4>CATEGORIA ANTT:</h4></td>
								<td><input autocomplete="off" name="caa_mot" type=text size=16 maxlength=16></td>
							</tr>
							<tr>
								<td><h4>VALIDADE ANTT:</h4></td>
								<td><input autocomplete="off" name="vaa_mot" type=date></td>
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
	$cad_mot = trim($_POST['cad_mot']);
	$nom_mot = trim($_POST['nom_mot']);
	$vei_mot = trim($_POST['vei_mot']);
	$pla_mot = trim($_POST['pla_mot']);
	$tel_mot = trim($_POST['tel_mot']);
	$end_mot = trim($_POST['end_mot']);
	$cpf_mot = trim($_POST['cpf_mot']);
	$rg_mot = trim($_POST['rg_mot']);
	$nas_mot = trim($_POST['nas_mot']);
	$nat_mot = trim($_POST['nat_mot']);
	$cnh_mot = trim($_POST['cnh_mot']);
	$val_mot = trim($_POST['val_mot']);
	$cat_mot = trim($_POST['cat_mot']);
	$cep_mot = trim($_POST['cep_mot']);
	$ban_mot = trim($_POST['ban_mot']);
	$cod_mot = trim($_POST['cod_mot']);
	$age_mot = trim($_POST['age_mot']);
	$con_mot = trim($_POST['con_mot']);
	$ano_mot = trim($_POST['ano_mot']);
	$cor_mot = trim($_POST['cor_mot']);
	$ren_mot = trim($_POST['ren_mot']);
	$num_mot = trim($_POST['num_mot']);
	$ant_mot = trim($_POST['ant_mot']);
	$caa_mot = trim($_POST['caa_mot']);
	$vaa_mot = trim($_POST['vaa_mot']);
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$nom_mot' and `placa` = '$pla_mot'");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
	if($n != 0){
?>
			<script>alert('MOTORISTA JÁ CADASTRADO!');</script>
<?php
	}
	else
	{
#INSERINDO DADOS NA TABELA
        $sql = mysqli_query($conn,"INSERT INTO $tab_mot (`cadastro`, `nome`, `veiculo`, `placa`, `telefone`, `endereco`, `cpf`, `rg`, `nascimento`, `naturalidade`, `cnh`, `validade_cnh`, `categoria_cnh`, `cep`, `banco`, `cod_banco`, `agencia_banco`, `conta_banco`, `ano_veiculo`, `cor_veiculo`, `renavam`, `num_chassi`, `antt`, `categoria_antt`, `validade_antt`)  VALUES ('$cad_mot', '$nom_mot', '$vei_mot', '$pla_mot', '$tel_mot', '$end_mot', '$cpf_mot', '$rg_mot', '$nas_mot', '$nat_mot', '$cnh_mot', '$val_mot', '$cat_mot', '$cep_mot', '$ban_mot', '$cod_mot', '$age_mot', '$con_mot', '$ano_mot', '$cor_mot', '$ren_mot', '$num_mot', '$ant_mot', '$caa_mot', '$vaa_mot')");
?>
            <script>alert('MOTORISTA CADASTRADO COM SUCESSO!');</script>
<?php
    }
}
?>
        <urm>
            <table class="tableb" border=1>
                <h3>MOTORISTAS CADASTRADOS</h3>
                <tr>
					<th><h3>EXCLUIR</h3></th>
					<th><h3>EDITAR</h3></th>
					<th><h3>CADASTRO</h3></th>
					<th><h3>NOME</h3></th>
					<th><h3>VEÍCULO</h3></th>
					<th><h3>PLACA</h3></th>
					<th><h3>TELEFONE</h3></th>
					<th><h3>ENDERECO</h3></th>
				</tr>
<?php
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot ORDER BY `id` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO DADOS DA TABELA
	while($i!=$n){
#CADASTROS POR COLUNA
		$vn = mysqli_fetch_array($sql);	?>
				<tr>
					<form method="post" action="..\excluir/resultado_excluir_motoristas.php">
                		<input autocomplete="off" type="hidden" name="id" value="<?php echo $vn['id'];?>">
                    <td><nobr><input autocomplete="off" class="inpute" width="15" type="image" src="..\imagem/delete.png" alt="submit"></td>
            		</form>
            		<form method="post" action="..\alterar/resultado_alterar_motoristas.php">
                		<input autocomplete="off" type="hidden" name="id" value="<?php echo $vn['id'];?>">
                    <td><input autocomplete="off" class="inpute" width="15" type="image" src="..\imagem/alter.png" alt="submit"></nobr></td>
					</form>
					<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['nome'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['veiculo'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['placa'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['telefone'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['endereco'];   ?></nobr></h4></td>
				</tr>
<?php
#SOMANDO AO CONTADOR
		$i = $i + 1;
	}
?>
            </table>
        </urm>
	</body>
</html>
<?php
    }
}
?>