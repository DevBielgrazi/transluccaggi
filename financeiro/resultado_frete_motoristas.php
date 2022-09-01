<?php
session_start();
if(!isset($_SESSION["system_control"])){
?>
	<script>
		document.location.href="http://localhost/transluccaggi/financeiro/index_financeiro.html";
	</script>
<?php
}else{
	$system_control = $_SESSION["system_control"];
	if($system_control == 2){
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
            <back>
                <a href="form_frete_motoristas.php"><img src="..\imagem/back.png" width=20%></a>
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
#VARIÁVEIS DO FORMULÁRIO
	$dat_fre = trim($_POST['dat_fre']);
    $mot_fre = trim($_POST['mot_fre']);
#ADQUIRINDO INFORMAÇÕES DO BANCO
    $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `motorista` = '$mot_fre' and `saida` = '$dat_fre'");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO NÚMERO DE REGISTROS
	if($n!=0){
        $sql2 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `motorista` = '$mot_fre' and `saida` = '$dat_fre'");
	    $sql2 = mysqli_fetch_array($sql2);
#VARIÁVEL DO BANCO
	    $val_tot = number_format(($sql2['val']), 2, '.', '');
?>
    <pag>
        <table>
            <tr>
                <td>
                    <form method="post" action="frete_motoristas.php">
                        <table>
                            <input autocomplete="off" type="hidden" name="mot_fre" value="<?php echo $mot_fre;  ?>">
                            <input autocomplete="off" type="hidden" name="dat_fre" value="<?php echo $dat_fre;  ?>">
                            <tr>
                                <td><h4>VALOR FRETE:</h4></td>
                                <td><input autocomplete="off" name="val_fre" type=float size=16 maxlength=16 required></td>
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
	<pag2>
		<table class="tableb" border=1>
			<tr><h1>FRETE MOTORISTA</h1></tr>
			<tr>
				<th><h3>DATA:</h3><h4><?php  echo date( 'd/m/Y' , strtotime($dat_fre)); ?></h4></th>
                <th><h3>MOTORISTA:</h3><h4><?php  echo $mot_fre; ?></h4></th>
                <th><h3>VALOR NOTAS:</h3><h4><?php  echo "R$".$val_tot; ?></h4></th>
            </tr>
        </table>
    </pag2>
    <login>
		<table class="tableb" border=1>
            <tr>
				<th><h3>CIDADES</h3></th>
		</tr>
<?php
#INICIANDO CONTADOR
    $i=0;
#VERIFICANDO EXISTÊNCIA NO FORMULÁRIO
	$sql = mysqli_query($conn,"SELECT DISTINCT `cidade_cliente` FROM $tab_nfs WHERE `motorista` = '$mot_fre' AND `saida` = '$dat_fre'");
	$n = mysqli_num_rows($sql);
#APRESENTANDO REGISTROS NO BANCO
    while($i!=$n){
        $vn = mysqli_fetch_array($sql);
?>
            <tr>
                <td><h4><nobr><?php echo $vn['cidade_cliente'];    ?></nobr></h4></td>
<?php
#SOMANDO AO CONTADOR
    $i = $i + 1;
    }
?>
    </login>
<?php
	}else{
		?>
			<script>alert("MOTORISTA SEM FRETE NESTA DATA!");
			document.location.href="form_frete_motoristas.php"</script>
		<?php
	}
?>
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