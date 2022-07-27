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
	if($system_control == 2){
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
		<bar>
			<canvas width="1365" height="70" style="background-color:rgb(42, 129, 187)"></canvas>
		</bar>
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
        	<a href="form_frete_motoristas.php"><img src="..\imagem/back.png" width=20%></a>
        </back>
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('..\connect.php');
#VARIÁVEIS DO FORMULÁRIO
    $mot_fre = trim($_POST['mot_fre']);
    $dat_fre = trim($_POST['dat_fre']);
    $val_fre = trim($_POST['val_fre']);
    $sai_fre = 1;
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_fre WHERE `data` = '$dat_fre' AND `motorista` = '$mot_fre'");
#TRANSFORMANDO RESULTADO EM NUMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
	if($n != 0){
        $vn = mysqli_fetch_array($sql);
        $sai_frea = $vn['saidas'];
        $sai_fre = $sai_fre+$sai_frea;
        $sql = mysqli_query($conn,"UPDATE $tab_fre SET `valor` = '$val_fre', `saidas` = '$sai_fre' WHERE `data` = '$dat_fre' AND `motorista` = '$mot_fre'");
	}else{
		$sql2 = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$mot_fre'");
		$vn = mysqli_fetch_array($sql2);
		$id_mot = $vn['id'];
		$sql = mysqli_query($conn,"INSERT INTO $tab_fre(`data`, `id_motorista`, `motorista`, `valor`, `saidas`) VALUES ('$dat_fre', '$id_mot', '$mot_fre', '$val_fre', '$sai_fre')");
	}
?>
		<pag>
			<table class="tableb" border=1>
				<h1>FRETE POR MOTORISTAS</h1>
				<tr>
					<th><h3>DATA</h3></th>
					<th><h3>MOTORISTA</h3></th>
					<th><h3>VALOR</h3></th>
				</tr>
                <tr>
					<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime($dat_fre));   ?><nobr></h4></td>
					<td><h4><nobr><?php echo $mot_fre;    ?><nobr></h4></td>
					<td><h4><nobr><?php echo "R$".$val_fre;    ?><nobr></h4></td>
				</tr>
			</table>
</pag>
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