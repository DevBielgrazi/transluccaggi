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
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('..\connect.php');
#VARIÁVEL HIDDEN DO BANCO
	$id = $_POST['id'];
#ADQUIRINDO DADOS DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `id` = '$id'");
#CADASTROS POR COLUNA
	$vn = mysqli_fetch_array($sql);
?>
            <pag>
			<h1>EXCLUIR CLIENTES</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="excluir_clientes.php">
							<table border=1>
                                <tr>
                                <td><h3>CÓDIGO</h3></td>
                                <td><h3>NOME</h3></td>
                                <td><h3>AGENDAR</h3></td>
                                <td><h3>CADASTRO</h3></td>
                                <td><h3>ROTA</h3></td>
                                <td><h3>CIDADE</h3></td>
                                <td><h3>BAIRRO</h3></td>
                                <td><h3>ENDEREÇO</h3></td>
                                <td><h3>COD_<br>DISTRIBUIDORA</h3></td>
                                </tr>
                                <input type="hidden" name="id" value="<?php echo $vn['id'];?>">
                                <input type="hidden" name="cod_cli" value="<?php echo $vn['codigo'];?>">
								<h6>DESEJA MESMO EXCLUIR ESSE CLIENTE?</h6>
                                <td><h4><nobr><?php echo $vn['codigo'];   ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['nome'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['agendar'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['rota'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['cidade'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['bairro'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['endereco'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['cod_distribuidora'];    ?></nobr></h4></td>
							</table>
                            <tr>
                                <td><input class="inputc" type=submit value=SIM>
						</form>
                        <form method="post" action="..\pesquisa\form_pesquisar_clientes.php">
                                <input class="inputb" type=submit value=NÃO></td>
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