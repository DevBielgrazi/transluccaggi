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
                <a href="form_relatorio_diario_cidades.php">>RELATÓRIO DIÁRIO CIDADES</a>
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