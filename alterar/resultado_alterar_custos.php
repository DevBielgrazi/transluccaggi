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
?><!DOCTYPE html>
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
            <back>
                <a href="..\pesquisa/form_relatorio_mensal.php"><img src="..\imagem/back.png" width=20%></a>
            </back>
            <logo>
                <a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
            </logo>
            <exit>
                <a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
            </exit>
		</div>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('..\connect.php');
#VARIÁVEL HIDDEN DO FORMULÁRIO
    $dat_cus = trim($_POST['dat_cus']);
    $des_cus = trim($_POST['des_cus']);
    $val_cus = trim($_POST['val_cus']);
#ADQUIRINDO DADOS DO BANCO
    $sql = mysqli_query($conn,"SELECT * FROM $tab_cus WHERE `mes` = '$dat_cus' AND `descricao` = '$des_cus' AND `valor` = '$val_cus'");
#CADASTROS POR COLUNA
    $vn = mysqli_fetch_array($sql);
?>
            <pag>
			<h1>ALTERAR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="alterar_custos.php">
							<table>
                                <input autocomplete="off" type="hidden" name="dat_cus" value="<?php echo $vn['mes'];?>">
                                <input autocomplete="off" type="hidden" name="des_cus" value="<?php echo $vn['descricao'];?>">
                                <input autocomplete="off" type="hidden" name="val_cus" value="<?php echo $vn['valor'];?>">
								<tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="des">DESCRIÇÃO:<?php echo $vn['descricao'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="des_cusn" type=int size=16 maxlength=16 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="val">VALOR: R$<?php echo $vn['valor'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="val_cusn" type=int size=16 maxlength=8 ></td>
								</tr>
							</table>
                            <tr>
                                <td><input autocomplete="off" class="inputb" type=submit value=ALTERAR></td>
                            </tr>
						</form>
					</td>
				</tr>
			</table>
		</pag>
    </body>
</html>
<?php
    }
}
?>