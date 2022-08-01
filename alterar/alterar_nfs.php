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
        	<a href="..\pesquisa/form_pesquisar_nfs.php"><img src="..\imagem/back.png" width=20%></a>
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
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$num_nf = trim($_POST['num_nf']);
    $ser_nf = trim($_POST['ser_nf']);
    $emi_nf = trim($_POST['emi_nf']);
    $ent_nf = trim($_POST['ent_nf']);
    $sai_nf = trim($_POST['sai_nf']);
    $val_nf = trim($_POST['val_nf']);
    $pes_nf = trim($_POST['pes_nf']);
    $cod_cli = trim($_POST['cod_cli']);
    $mot_nf = trim($_POST['mot_nf']);
    $id = $_POST['id'];
#VERIFICANDO EXISTÊNCIA DO INPUT
    if(!isset($_POST['opc'])){
        $fil_nf = "nul";
    }else{
        $fil_nf = $_POST['opc'];
    }
#ADQUIRINDO INFORMAÇÕES DO BANCO
    $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
#CADASTROS POR COLUNA
    $sql2 = mysqli_fetch_array($sql);
    $num_nfa = $sql2['numero'];
    $ser_nfa = $sql2['serie'];
    $cod_clia = $sql2['cod_cliente'];
    $cod_disa = $sql2['cod_distribuidora'];
#VERIFICANDO INPUT SELECIONADO
    switch($fil_nf){
        case "num":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf' and `serie` = '$ser_nfa' and `cod_distribuidora` = '$cod_disa'");
#TRANSFORMANDO RESULTADO EM NÚMEROS
            $n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
            if($n!=0){
                ?>
				<script>
			        alert("NOTA JÁ CADASTRADA!");
			    </script>
			<?php
            }
            else
            {
#ALTERANDO DADOS DO CAMPO SELECIONADO
                $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `numero` = '$num_nf' WHERE `id` = '$id'");
            }
            break;
        case "ser":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nfa' and `serie` = '$ser_nf' and `cod_distribuidora` = '$cod_disa'");
            $n = mysqli_num_rows($sql);
            if($n!=0){
                ?>
				<script>
			        alert("NOTA JÁ CADASTRADA!");
			    </script>
			<?php
            }
            else{
                $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `serie` = '$ser_nf' WHERE `id` = '$id'");
            }
            break;
        case "emi":
            $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `emissao` = '$emi_nf' WHERE `id` = '$id'");
            break;
        case "ent":
            $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `entrada` = '$ent_nf' WHERE `id` = '$id'");
            break;
        case "sai":
            $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `saida` = '$sai_nf' WHERE `id` = '$id'");
            break;
        case "val":
            $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `valor` = '$val_nf' WHERE `id` = '$id'");
            break;
        case "pes":
            $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `peso` = '$pes_nf' WHERE `id` = '$id'");
            break;
        case "cli":
            $sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");		
		    $n2 = mysqli_num_rows($sql);
            if($n2!=0)
            {
                $sql3 = mysqli_fetch_array($sql);
                $cod_dis = $sql3['cod_distribuidora'];
                $rot_nf = $sql3['rota'];
                $nom_cli = $sql3['nome'];
                $cid_cli = $sql3['cidade'];
                $bai_cli = $sql3['bairro'];
                $end_cli = $sql3['endereco'];
                $age = $sql3['agendar'];
#VERIFICANDO COLUNA DA TABELA
                if($age!="SIM")
                {
                    $status = "DISPONIVEL";
                }else{
                    $status = "AGENDAR";
                }
                $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `cod_cliente` = '$cod_cli', `rota` = '$rot_nf', `nome_cliente` = '$nom_cli', `bairro_cliente` = '$bai_cli', `cidade_cliente` = '$cid_cli', `endereco_cliente` = '$end_cli', `cod_distribuidora` = '$cod_dis', `status` = '$status' WHERE `id` = '$id'");
            }
            else
            {
?>
				<script>
			        alert("CLIENTE NÃO CADASTRADO!");
			    </script>
<?php
            }
            break;
        case "mot":
            $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `motorista` = '$mot_nf' WHERE `id` = '$id'");
            break;
        default:
            $sql2 = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
            break;
    }
?>
                <script>
			        alert("NOTA ATUALIZADA!");
			    </script>
        <urn2>
            <table border=1>
                <h3>NOTAS CADASTRADAS</h3>
                <tr>
                    <td><h3>NÚMERO</h3></td>
                    <td><h3>SÉRIE</h3></td>
                    <td><h3>EMISSÃO</h3></td>
                    <td><h3>ENTRADA</h3></td>
                    <td><h3>SAÍDA</h3></td>
                    <td><h3>VALOR</h3></td>
                    <td><h3>PESO</h3></td>
                    <td><h3>COD_CLIENTE</h3></td>
                    <td><h3>MOTORISTA</h3></td>
                    <td><h3>STATUS</h3></td>
                </tr>
<?php
    $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
    $n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
    $i=0;
#APRESENTANDO DADOS DA TABELA
    while($i!=$n)
    {
        $vn = mysqli_fetch_array($sql);
?>                        
                <tr>
                    <td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['saida']));    ?></nobr></h4></td>
                    <td><h4><nobr>R$<?php echo $vn['valor'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['peso'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['cod_cliente'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['motorista'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['status'];    ?></nobr></h4></td>
                </tr>
<?php
#SOMANDO AO CONTADOR
            $i = $i + 1;
        }
?>
            </table>
        </urn2>
	</body>
</html>
<?php
    }
}
?>