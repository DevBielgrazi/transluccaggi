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
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
        <menu>
            <a href="http://localhost/transluccaggi/menu.php"><img src="..\imagem/logo.png" width=20%></a>
            <h1>MATRIZ PRINCIPAL</h1><p>
            <a href="http://localhost/transluccaggi/logout.php"><img src="..\imagem/exit.png" width=3%></a>
            <table class="tableb">
                <tr><td><a href="../saida/form_saida_motorista.php"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
                <tr><td><a href="../saida/form_baixa_canhotos.php"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
                <tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
                <tr><td><a href="../saida/form_registro_devolucao.php"><button class="buttonb">REGISTRO DE DEVOLUÇÕES</button></a></td></tr>
                <tr><td><h2>CADASTROS</h2></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><h2>PESQUISAS</h2></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_nfs.php"><button>NOTAS</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_clientes.php"><button>CLIENTES</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><h2>MOTORISTAS</h2></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_motoristas.php"><button>CADASTRAR</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_motoristas.php"><button>PESQUISAR</button></a></td></tr>
                <tr><td><h2>FINANCEIRO</h2></td></tr>
                <tr><td><a href="..\financeiro/form_relatorio_mensal.php"><button>RELATÓRIO MENSAL</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_frete_motoristas.php"><button>FRETE MOTORISTAS</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_fechamento_distribuidoras.php"><button>FECHAMENTO DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_fechamento_motoristas.php"><button>FECHAMENTO MOTORISTAS</button></a></td></tr>
            </table>
        </menu>
        <rn>
<?php
#VARIÁVEIS DO FORMULÁRIO
$ano_cus = trim($_POST['ano_rel']);
$mes_cus = trim($_POST['mes_rel']);
$dat_cus = $ano_cus."-".$mes_cus."-01";
?>
		<rf>
			<table border=1>
				<tr>
					<td><h3>DATA:</h3></td>
                    <td><h4><nobr><?php echo date( 'm/Y' , strtotime($dat_cus));   ?></nobr></h4></td>
                </tr>
                <tr>
					<td><h3>DESCRIÇÃO</h3></td>
                    <td><h3>CUSTO</h3></td>
				</tr>
<?php
    require('../connect.php');
    $sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'cus' FROM $tab_cus WHERE `mes` = '$dat_cus'");
    $sql = mysqli_fetch_array($sql);
    $cus_men = number_format(($sql['cus']), 2, '.', '');

    $sql = mysqli_query($conn,"SELECT * FROM $tab_cus WHERE `mes` = '$dat_cus'");
	$n = mysqli_num_rows($sql);
    $i=0;
    while($i!=$n){
        $vn = mysqli_fetch_array($sql);
?>
                <tr>
                    <td><h4><nobr><?php echo $vn['descricao'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
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
        </rf>
		<pag2>
			<h1>CUSTOS MENSAL</h1><p>
            <form method="post" action="relatorio_mensal.php">
                <input type="hidden" name="mes_rel" value="<?php echo date( 'm' , strtotime($dat_cus));?>">
                <input type="hidden" name="ano_rel" value="<?php echo date( 'Y' , strtotime($dat_cus));?>">
                <td><button class="buttond" type=submit>RELATÓRIO MENSAL</button></td>
            </form>
			<table>
                <tr>
                    <td>
                        <form method="post" action="cadastrar_custos.php">
                            <table>
                            <input type="hidden" name="dat_cus" value="<?php echo $dat_cus;?>">
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