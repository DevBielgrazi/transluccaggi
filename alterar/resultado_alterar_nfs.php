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
?><html>
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
                <tr><td><a href="..\financeiro/form_financeiro_fretes.php"><button>FRETE MOTORISTAS</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_frete_distribuidoras.php"><button>FRETE DISTRIBUIDORAS</button></a></td></tr>
            </table>
        </menu>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('..\connect.php');
#VARIÁVEL HIDDEN DO FORMULÁRIO
	$id = $_POST['id'];
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
#CADASTROS POR COLUNA
	$vn = mysqli_fetch_array($sql);
?>
            <pag>
			<h1>ALTERAR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="alterar_nfs.php">
							<table>
                                <input type="hidden" name="id" value="<?php echo $vn['id'];?>">
								<tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="num">NÚMERO:<?php echo $vn['numero'];   ?></nobr></h2></td>
                                    <td><input name="num_nf" type=int size=16 maxlength=16 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ser">SÉRIE:<?php echo $vn['serie'];   ?></nobr></h2></td>
                                    <td><input name="ser_nf" type=int size=16 maxlength=8 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="emi">EMISSÃO:<?php echo $vn['emissao'];   ?></nobr></h2></td>
                                    <td><input name="emi_nf" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ent">ENTRADA:<?php echo $vn['entrada'];   ?></nobr></h2></td>
                                    <td><input name="ent_nf" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="sai">SAÍDA:<?php echo $vn['saida'];   ?></nobr></h2></td>
                                    <td><input name="sai_nf" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="val">VALOR:<?php echo $vn['valor'];   ?></nobr></h2></td>
                                    <td><input name="val_nf" type=float size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="pes">PESO:<?php echo $vn['peso'];   ?></nobr></h2></td>
                                    <td><input name="pes_nf" type=float size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cli">COD_CLIENTE:<?php echo $vn['cod_cliente'];   ?></nobr></h2></td>
                                    <td><input name="cod_cli" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="mot">MOTORISTA:<?php echo $vn['motorista'];   ?></nobr></h2></td>
                                    <td><input name="mot_nf" type=text size=16 maxlength=16></td>
								</tr>
							</table>
                            <tr>
                                <td><input class="inputb" type=submit value=ALTERAR></td>
                            </tr>
						</form>
					</td>
				</tr>
			</table>
		</pag>
    </body>
</html>
<?php
    }
}
?>