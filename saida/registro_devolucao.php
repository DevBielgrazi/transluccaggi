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
                <a href="form_saida_motorista.php">>SAÍDA DE MOTORISTAS</a>
                <a href="baixa_canhotos.php">>BAIXA DE CANHOTOS</a>
                <a href="form_romaneio_cargas.php">>ROMANEIO DE CARGAS</a>
                <a href="registro_devolucao.php">>REGISTRO DE DEVOLUÇÕES</a>
				<a href="agendar_entrega.php">>AGENDAR ENTREGA</a>
                <a href="..\cadastro/cadastrar_nfs.php">>CADASTRO NOTAS</a>
                <a href="..\cadastro/cadastrar_clientes.php">>CADASTRO CLIENTES</a>
                <a href="..\cadastro/cadastrar_distribuidoras.php">>CADASTRO DISTRIBUIDORAS</a>
                <a href="..\pesquisa/form_pesquisar_nfs.php">>PESQUISAR NOTAS</a>
                <a href="..\pesquisa/form_pesquisar_clientes.php">>PESQUISAR CLIENTES</a>
                <a href="..\pesquisa/form_pesquisar_distribuidoras.php">>PESQUISAR DISTRIBUIDORAS</a>
                <a href="..\cadastro/cadastrar_motoristas.php">>CADASTRAR MOTORISTA</a>
                <a href="..\pesquisa/form_pesquisar_motoristas.php">>PESQUISAR MOTORISTA</a>
                <a href="..\financeiro/form_relatorio_diario.php">>RELATÓRIO DIÁRIO</a>
                <a href="..\financeiro/form_relatorio_diario_cidades.php">>RELATÓRIO DIÁRIO CIDADES</a>
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