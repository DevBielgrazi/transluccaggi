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
		<link rel="stylesheet" href="print.css" media="print"/>
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
			<h1>REGISTRO DE DEVOLUÇÕES</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="registro_devolucao.php">
							<table>
								<tr>
									<td><h4>NOTA:</h4></td>
									<td><input autocomplete="off" name="not_dev" type=text size=16 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>NOTA PARCIAL:</h4></td>
									<td><input autocomplete="off" name="par_dev" type=text size=16 maxlength=32></td>
								</tr>
								<tr>
									<td><h4>VALOR:</h4></td>
									<td><input autocomplete="off" name="val_dev" type=text size=16 maxlength=32></td>
								</tr>
								<tr>
									<td><h4>VOLUMES:</h4></td>
									<td><input autocomplete="off" name="vol_dev" type=text size=16 maxlength=32></td>
								</tr>
								<tr>
									<td><h4>MOTIVO:</h4></td>
									<td><input autocomplete="off" name="mot_dev" type=text size=16 maxlength=32></td>
								</tr>
                                <tr>
									<td><h4>PROTOCOLO:</h4></td>
									<td><input autocomplete="off" name="pro_dev" type=text size=16 maxlength=32></td>
								</tr>
							</table>
							<tr>
								<td><input autocomplete="off" class="inputb" type=submit value=REGISTRAR></td>
							</tr>
						</form>
					</td>
				</tr>
			</table>
		</pag>
		<?php
#IMPORTANDO CONEXÃO COM O BANCO
    require('../connect.php');
#ADQUIRINDO INFORMAÇÕES DO BANCO
if(isset($_POST['not_dev'])){	
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
    $sql2 = mysqli_query($conn,"SELECT * FROM $tab_dev WHERE `nota` = '$not_dev' ORDER BY `id` DESC");
    $n = mysqli_num_rows($sql2);
    if($n!=0){
        $v = mysqli_fetch_array($sql2);
        $status = $v['status'];
        if($status=='AGUARDANDO'){
	        $pro_dev = trim($_POST['pro_dev']);
            $sql3 = mysqli_query($conn,"UPDATE $tab_dev SET `status`='LIBERAR', `protocolo`='$pro_dev' WHERE `nota` = '$not_dev'");
            ?>
                <script>alert("NOTA AGUARDANDO LIBERAÇÃO");</script>
            <?php
        }elseif($status=='INFORMAR'){
            $sql3 = mysqli_query($conn,"UPDATE $tab_dev SET `parcial`='$par_dev',`valor`='$val_dev',`volumes`='$vol_dev',`motivo`='$mot_dev',`status`='AGUARDANDO' WHERE `nota` = '$not_dev'");
    ?>
            <script>alert("NOTA REGISTRADA");</script>
<?php
        }else{
?>
            <script>alert("NOTA JÁ LIBERADA");</script>
<?php
        }
    }
}
?>
            <urn>
                <table class="tableb" border=2>
                    <h3>DEVOLUÇÕES</h3>
                    <tr>
                        <th><h3>LIBERAR</h3></th>
                        <th><h3>NOTA</h3></th>
                        <th><h3>NOTA PARCIAL</h3></th>
                        <th><h3>VALOR</h3></th>
                        <th><h3>VOLUMES</h3></th>
                        <th><h3>CIDADE</h3></th>
                        <th><h3>CLIENTE</h3></th>
                        <th><h3>COD_CLIENTE</h3></th>
                        <th><h3>MOTIVO</h3></th>
                        <th><h3>TIPO</h3></th>
                        <th><h3>PROTOCOLO</h3></th>
                        <th><h3>STATUS</h3></th>
                    </tr>
    <?php
    #INICIANDO CONTADOR
        $i=0;
    #APRESENTANDO DADOS DA TABELA
    $sql = mysqli_query($conn,"SELECT * FROM $tab_dev WHERE `status` != 'LIBERADA' ORDER BY `status`");
    $n = mysqli_num_rows($sql);
        while($i!=$n)
        {
            $vn = mysqli_fetch_array($sql);
    ?>                        
                    <tr>
                        <td><form method="post" action="liberar_devolucao.php">
                            <input autocomplete="off" type="hidden" name="id" value="<?php echo $vn['id'];?>">
                            <nobr><input autocomplete="off" class="inpute" width="15" type="image" src="..\imagem/check.png" alt="submit">
                        </form></td>
                        <td><h4><nobr><?php echo $vn['nota'];   ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['parcial'];    ?></nobr></h4></td>
                        <td><h4><nobr>R$<?php echo $vn['valor'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['cidade'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['cliente'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['cod_cliente'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['motivo'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['tipo'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['protocolo'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['status'];    ?></nobr></h4></td>
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