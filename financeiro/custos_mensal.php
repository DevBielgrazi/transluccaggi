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
        if(isset($_POST['des_cus'])){
            #VARIÁVEIS DO FORMULÁRIO
            $dat_cus2 = trim($_POST['dat_cus']);
            $des_cus = trim($_POST['des_cus']);
            $val_cus = trim($_POST['val_cus']);

            $des_cus = strtolower($des_cus);

            require('../connect.php');
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cus WHERE `mes` = '$dat_cus2' AND `descricao` = '$des_cus'");
            $n = mysqli_num_rows($sql);

            if($n!=0){
                $sql = mysqli_query($conn,"UPDATE $tab_cus SET `valor` = '$val_cus' WHERE `mes` = '$dat_cus2' AND `descricao` = '$des_cus'");
            }else{
                $sql = mysqli_query($conn,"INSERT INTO $tab_cus VALUES ('$dat_cus2','$des_cus','$val_cus')");
            }
        }
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
                <a href="..\cadastro/cadastrar_nfs.php">>CADASTRO NOTAS</a>
                <a href="..\cadastro/cadastrar_clientes.php">>CADASTRO CLIENTES</a>
                <a href="..\cadastro/cadastrar_distribuidoras.php">>CADASTRO DISTRIBUIDORAS</a>
                <a href="..\pesquisa/form_pesquisar_nfs.php">>PESQUISAR NOTAS</a>
                <a href="..\pesquisa/form_pesquisar_clientes.php">>PESQUISAR CLIENTES</a>
                <a href="..\pesquisa/form_pesquisar_distribuidoras.php">>PESQUISAR DISTRIBUIDORAS</a>
                <a href="..\cadastro/cadastrar_motoristas.php">>CADASTRAR MOTORISTA</a>
                <a href="..\pesquisa/form_pesquisar_motoristas.php">>PESQUISAR MOTORISTA</a>
                <a href="form_relatorio_diario.php">>RELATÓRIO DIÁRIO</a>
                <a href="form_relatorio_mensal.php">>RELATÓRIO MENSAL</a>
                <a href="form_relatorio_anual.php">>RELATÓRIO ANUAL</a>
                <a href="form_frete_motoristas.php">>FRETE MOTORISTAS</a>
                <a href="form_fechamento_distribuidoras.php">>FECHAMENTO DISTRIBUIDORAS</a>
                <a href="form_fechamento_motoristas.php">>FECHAMENTO MOTORISTAS</a>
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
        	<a href="form_relatorio_mensal.php"><img src="..\imagem/back.png" width=20%></a>
        </back>
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
<?php
#VARIÁVEIS DO FORMULÁRIO
$ano_cus = trim($_POST['ano_rel']);
$mes_cus = trim($_POST['mes_rel']);
$dat_cus2 = $ano_cus."-".$mes_cus."-01";
?>
		<pag3>
			<table border=1>
				<tr>
					<td><h3>MÊS:</h3></td>
                    <td><h4><nobr><?php echo date( 'm/Y' , strtotime($dat_cus2));   ?></nobr></h4></td>
                </tr>
                <tr>
					<td><h3>DESCRIÇÃO</h3></td>
                    <td><h3>CUSTO</h3></td>
                    <td><h3>EXCLUIR</h3></td>
                    <td><h3>EDITAR</h3></td>
				</tr>
<?php
    require('../connect.php');
    $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'cus' FROM $tab_cus WHERE `mes` = '$dat_cus2'");
    $sql = mysqli_fetch_array($sql);
    $cus_men = number_format(($sql['cus']), 2, '.', '');

    $sql = mysqli_query($conn,"SELECT * FROM $tab_cus WHERE `mes` = '$dat_cus2'");
	$n = mysqli_num_rows($sql);
    $i=0;
    while($i!=$n){
        $vn = mysqli_fetch_array($sql);
?>
                <tr>
                    <td><h4><nobr><?php echo $vn['descricao'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
                <form method="post" action="..\excluir/resultado_excluir_custos.php">
                    <input type="hidden" name="dat_cus" value="<?php echo $vn['mes'];?>">
                    <input type="hidden" name="des_cus" value="<?php echo $vn['descricao'];?>">
                    <input type="hidden" name="val_cus" value="<?php echo $vn['valor'];?>">
                    <td><nobr><input class="inpute" width="40" type="image" src="..\imagem/delete.png" alt="submit"></td>
                </form>
                <form method="post" action="..\alterar/resultado_alterar_custos.php">
                    <input type="hidden" name="dat_cus" value="<?php echo $vn['mes'];?>">
                    <input type="hidden" name="des_cus" value="<?php echo $vn['descricao'];?>">
                    <input type="hidden" name="val_cus" value="<?php echo $vn['valor'];?>">
                    <td><input class="inpute" width="40" type="image" src="..\imagem/alter.png" alt="submit"></td>
                </form>
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
            <form method="post" action="..\graficos/grafico_custos.php" target="_blank">
            <input type="hidden" name="dat_cus" value="<?php echo $dat_cus2;?>">
            <td><nobr><input width="80" type="image" src="..\imagem/grafico.jpg" alt="submit"></td>
        </form>
        </pag3>
        <pag2>
			<h1>CUSTOS MENSAL</h1><p>
            <form method="post" action="relatorio_mensal.php">
                <input type="hidden" name="mes_rel" value="<?php echo date( 'm' , strtotime($dat_cus2));?>">
                <input type="hidden" name="ano_rel" value="<?php echo date( 'Y' , strtotime($dat_cus2));?>">
                <td><button class="buttond" type=submit>RELATÓRIO MENSAL</button></td>
            </form>
			<table>
                <tr>
                    <td>
                        <form method="post" action="custos_mensal.php">
                            <table>
                            <input type="hidden" name="dat_cus" value="<?php echo $dat_cus2;?>">
                            <input type="hidden" name="ano_rel" value="<?php echo $ano_cus;?>">
                            <input type="hidden" name="mes_rel" value="<?php echo $mes_cus;?>">
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