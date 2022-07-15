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
        <back>
        	<a href="form_romaneio_cargas.php"><img src="..\imagem/back.png" width=20%></a>
        </back>
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
        <rn>
<?php
#VARIÁVEIS DO FORMULÁRIO
$dat = trim($_POST['dat']);
$dat2 = trim($_POST['dat2']);
$dis = trim($_POST['dis']);
?>
            <form method="post" action="imprimir_romaneio.php" target="_blank">
                <input type="hidden" name="dat" value="<?php echo $sat;  ?>">
                <input type="hidden" name="dat2" value="<?php echo $dat2;  ?>">
                <input type="hidden" name="dis" value="<?php echo $dis;  ?>">
                <input class="inpute" type=image width=10% height=10% src="..\imagem/imprimir.png" alt=submit>
            </form>
            <table border=1>
                <tr><h3>NOTAS FISCAIS</h3></tr>
                <tr>
                    <td><h3>ENTRADA</h3></td>
                    <td><h3>NÚMERO</h3></td>
                    <td><h3>VALOR</h3></td>
                    <td><h3>VOLUMES</h3></td>
                    <td><h3>CLIENTE</h3></td>
                    <td><h3>CIDADE</h3></td>
				</tr>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
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
                        <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['numero'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
                        <td><h4><nobr><?php echo $vn['cidade_cliente'];    ?></nobr></h4></td>
                    </tr>
<?php
#SOMANDO AO CONTADOR
        $i=$i+1;
    }
?>
            </table>
        </rn>
    </body>
</html>
<?php
    }
}
?>