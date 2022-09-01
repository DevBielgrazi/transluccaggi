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
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
    <div class="bar">
			<div class="dropdown">
        		<img onclick="myFunction()"class="dropbtn" src="..\imagem/bars.png" width="2%"></img>
				<div id="myDropdown" class="dropdown-content">
					<a href="..\saida/form_saida_motorista.php"><img src=..\imagem/saida.png> >SAÍDA DE MOTORISTAS</img></a>
					<a href="..\saida/baixa_canhotos.php"><img src=..\imagem/baixa.png>>BAIXA DE CANHOTOS</a>
					<a href="..\saida/form_romaneio_cargas.php"><img src=..\imagem/romaneio.png>>ROMANEIO DE CARGAS</a>
					<a href="..\saida/registro_devolucao.php"><img src=..\imagem/devolucao.png>>REGISTRO DE DEVOLUÇÕES</a>
					<a href="..\saida/agendar_entrega.php"><img src=..\imagem/agendar.png>>AGENDAR ENTREGA</a>
					<a href="..\cadastro/cadastrar_nfs.php"><img src=..\imagem/cad_not.png>>CADASTRO NOTAS</a>
					<a href="..\cadastro/cadastrar_clientes.php"><img src=..\imagem/cad_cli.png>>CADASTRO CLIENTES</a>
					<a href="..\cadastro/cadastrar_distribuidoras.php"><img src=..\imagem/cad_dis.png>>CADASTRO DISTRIBUIDORAS</a>
					<a href="..\pesquisa/form_pesquisar_nfs.php"><img src=..\imagem/pes_not.png>>PESQUISAR NOTAS</a>
					<a href="..\pesquisa/form_pesquisar_clientes.php"><img src=..\imagem/pes_cli.png>>PESQUISAR CLIENTES</a>
					<a href="..\pesquisa/form_pesquisar_distribuidoras.php"><img src=..\imagem/pes_dis.png>>PESQUISAR DISTRIBUIDORAS</a>
					<a href="..\cadastro/cadastrar_motoristas.php"><img src=..\imagem/cad_mot.png>>CADASTRAR MOTORISTA</a>
					<a href="..\pesquisa/form_pesquisar_motoristas.php"><img src=..\imagem/pes_mot.png>>PESQUISAR MOTORISTA</a>
					<a href="..\financeiro/form_relatorio_diario.php"><img src=..\imagem/diario.png>>RELATÓRIO DIÁRIO</a>
					<a href="..\financeiro/form_relatorio_diario_cidades.php"><img src=..\imagem/cid_dia.png>>RELATÓRIO DIÁRIO CIDADES</a>
					<a href="..\financeiro/form_relatorio_mensal.php"><img src=..\imagem/mensal.png>>RELATÓRIO MENSAL</a>
					<a href="..\financeiro/form_relatorio_mensal_cidades.php"><img src=..\imagem/cid_mes.png>>RELATÓRIO MENSAL CIDADES</a>
					<a href="..\financeiro/form_relatorio_anual.php"><img src=..\imagem/anual.png>>RELATÓRIO ANUAL</a>
					<a href="..\financeiro/form_relatorio_anual_cidades.php"><img src=..\imagem/cid_ano.png>>RELATÓRIO ANUAL CIDADES</a>
					<a href="..\financeiro/form_frete_motoristas.php"><img src=..\imagem/fre_mot.png>>FRETE MOTORISTAS</a>
					<a href="..\financeiro/form_fechamento_distribuidoras.php"><img src=..\imagem/fec_dis.png>>FECHAMENTO DISTRIBUIDORAS</a>
					<a href="..\financeiro/form_fechamento_motoristas.php"><img src=..\imagem/fec_mot.png>>FECHAMENTO MOTORISTAS</a>
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
		</div>
		<pag>
			<h1>AGENDAR ENTREGAS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="agendar_entrega.php">
							<table>
								<tr>
									<td><h4>NOTA FISCAL:</h4></td>
									<td><input autocomplete="off" name="age_nf" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>DATA:</h4></td>
									<td><input autocomplete="off" name="age_dat" type=date></td>
								</tr>
							</table>
							<tr>
								<td><input autocomplete="off" class="inputb" type=submit value=AGENDAR></td>
							</tr>
						</form>
					</td>
				</tr>
			</table>
		</pag>
        <urn>
                <table class="tableb" border=1>
                    <h3>DEVOLUÇÕES</h3>
                    <tr>
                        <th><h3>NÚMERO</h3></th>
                        <th><h3>SÉRIE</h3></th>
                        <th><h3>EMISSÃO</h3></th>
                        <th><h3>ENTRADA</h3></th>
                        <th><h3>VOLUMES</h3></th>
                        <th><h3>VALOR</h3></th>
                        <th><h3>PESO</h3></th>
                        <th><h3>CIDADE</h3></th>
                        <th><h3>BAIRRO</h3></th>
                        <th><h3>NOME_CLIENTE</h3></th>
                    </tr>
    <?php
    if(isset($_POST['age_nf'])) {
        #IMPORTANDO CONEXÃO COM O BANCO
            require('../connect.php');
        #VARIÁVEIS DO FORMULÁRIO
            $age_nf = trim($_POST['age_nf']);
            $age_dat = "AGENDADA PARA DIA:".date( 'd/m/Y' , strtotime( $_POST['age_dat']));
        
        #ADQUIRINDO DADOS DO BANCO
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$age_nf' AND `status` = 'AGENDAR' ORDER BY `id` DESC LIMIT 1");
            $n = mysqli_num_rows($sql);
            if($n != 0){
                $sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'AGENDADA', `observacao` = '$age_dat' WHERE `numero` = '$age_nf'");
                ?>
                    <script>alert("ENTREGA AGENDADA")</script>
                <?php
            }else{
                ?>
                <script>alert("NOTA NÃO ENCONTRADA")</script>
                <?php
            }
        }
    require('../connect.php');
    #INICIANDO CONTADOR
        $i=0;
    #APRESENTANDO DADOS DA TABELA
    $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `status` = 'AGENDAR' ORDER BY `entrada` DESC");
    $n = mysqli_num_rows($sql);
        while($i!=$n)
        {
            $vn = mysqli_fetch_array($sql);
    ?>                        
                    <tr>
                        <td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
						<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></nobr></h4></td>
						<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
						<td><h4><nobr>R$<?php echo $vn['valor'];    ?></nobr></h4></td>
						<td><h4><nobr><?php echo $vn['peso'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['cidade_cliente'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['bairro_cliente'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
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
?>