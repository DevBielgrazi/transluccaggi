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
                <a href="form_pesquisar_nfs.php">>PESQUISAR NOTAS</a>
                <a href="form_pesquisar_clientes.php">>PESQUISAR CLIENTES</a>
                <a href="form_pesquisar_distribuidoras.php">>PESQUISAR DISTRIBUIDORAS</a>
                <a href="..\cadastro/cadastrar_motoristas.php">>CADASTRAR MOTORISTA</a>
                <a href="form_pesquisar_motoristas.php">>PESQUISAR MOTORISTA</a>
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
        	<a href="form_pesquisar_motoristas.php"><img src="..\imagem/back.png" width=20%></a>
        </back>
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
        <rn>
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
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$cad_mot = strtoupper($_POST['cad_mot']);
	$cad_mot2 = strtoupper($_POST['cad_mot2']);
	$nom_mot = strtoupper($_POST['nom_mot']);
	$vei_mot = strtoupper($_POST['vei_mot']);
	$pla_mot = strtoupper($_POST['pla_mot']);
	$tel_mot = strtoupper($_POST['tel_mot']);
	$end_mot = strtoupper($_POST['end_mot']);
#VERIFICANDO EXISTÊNCIA DO INPUT
    if(!isset($_POST['opc'])){
        $fil_mot = "nul";
    }
    else
    {
        $fil_mot = strtoupper($_POST['opc']);
    }
#VERIFICANDO INPUT SELECIONADO
    switch ($fil_mot){
        case 'tod':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_mot  ORDER BY `id` DESC");
            break;
        case 'cad':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `cadastro` >= '$cad_mot' and `cadastro` <= '$cad_mot2' ORDER BY `id` DESC");
            break;
        case 'nom':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` LIKE '%$nom_mot%' ORDER BY `id` DESC");
            break;
        case 'vei':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `veiculo` = '$vei_mot' ORDER BY `id` DESC");
            break;
        case 'pla':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `placa` = '$pla_mot' ORDER BY `id` DESC");
            break;
        case 'tel':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `telefone` = '$tel_mot' ORDER BY `id` DESC");
            break;
        case 'end':
            $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `endereco` = '$end_mot' ORDER BY `id` DESC");
            break;
        default:
            $sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `id` = '0'");
            break;
    }
#TRANSFORMANDO RESULTADO EM NÚMEROS
    $n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
    $i=0;
#APRESENTANDO DADOS DA TABELA
    while($i!=$n)
    {
#CADASTROS POR COLUNA
        $vn = mysqli_fetch_array($sql); ?>
                <tr>
            <form method="post" action="..\excluir/resultado_excluir_motoristas.php">
                <input autocomplete="off" type="hidden" name="id" value="<?php echo $vn['id'];?>">
                    <td><nobr><input autocomplete="off" class="inpute" width="15" type="image" src="..\imagem/delete.png" alt="submit"></td>
            </form>
            <form method="post" action="..\alterar/resultado_alterar_motoristas.php">
                <input autocomplete="off" type="hidden" name="id" value="<?php echo $vn['id'];?>">
                    <td><input autocomplete="off" class="inpute" width="15" type="image" src="..\imagem/alter.png" alt="submit"></nobr></td>
                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['nome'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['veiculo'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['placa'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['telefone'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['endereco'];   ?></nobr></h4></td>
                </tr>
            </form>
<?php
#SOMANDO AO CONTADOR
        $i = $i + 1;
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