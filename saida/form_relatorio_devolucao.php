<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head> 
	<body>
		<menu>
			<a href="http://localhost/transluccaggi"><img src="..\imagem/logo.png" width=20%></a>
			<h1>MATRIZ PRINCIPAL</h1><p>
				<table class="tableb">
					<tr><td><a href="../saida/form_saida_motorista.html"><button>SAÍDA DE MOTORISTAS</button></a></td></tr>
					<tr><td><a href="../saida/form_baixa_canhotos.html"><button>BAIXA DE CANHOTOS</button></a></td></tr>
					<tr><td><a href="../saida/form_romaneio_cargas.php"><button>ROMANEIO DE CARGAS</button></a></td></tr>
					<tr><td><a href="../saida/form_relatorio_devolucao.php"><button>RELATÓRIO DE DEVOLUÇÕES</button></a></td></tr>
					<tr><td><h2>CADASTROS</h2></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                    <tr><td><h2>PESQUISAS</h2></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_nfs.html"><button>NOTAS</button></a></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_clientes.html"><button>CLIENTES</button></a></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_distribuidoras.html"><button>DISTRIBUIDORAS</button></a></td></tr>
                    <tr><td><h2>MOTORISTAS</h2></td></tr>
                    <tr><td><a href="..\cadastro/form_cadastrar_motoristas.php"><button>CADASTRAR</button></a></td></tr>
                    <tr><td><a href="..\pesquisa/form_pesquisar_motoristas.html"><button>PESQUISAR</button></a></td></tr>
            </table>
        </menu>
		<pag>
			<h1>RELATÓRIO DE DEVOLUÇÕES</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="relatorio_devolucao.php">
							<table>
                                <tr>
                                    <td><h4>INTEGRAL<input type="radio" name="opc" value="int" checked></h4></td>
                                    <td><h4>PARCIAL<input type="radio" name="opc" value="par"></h4></td>
                                </tr>
								<tr>
									<td><h4>NOTA:</h4></td>
									<td><input name="not_dev" type=text size=16 maxlength=32 required></td>
								</tr>
                                <tr>
									<td><h4>SÉRIE:</h4></td>
									<td><input name="ser_dev" type=text size=16 maxlength=32 required></td>
								</tr>
                                <tr>
									<td><h4>DISTRIBUIDORA:</h4></td>
									<td><select name="dis_dev">
<?php
require('../connect.php');
$sql = mysqli_query($conn,"SELECT * FROM $tab_dis");
$n = mysqli_num_rows($sql);
$i=0;
while($i!=$n){
	$v = mysqli_fetch_array($sql);
		?><option value="<?php	echo $v['nome']	?>"><?php	echo	$v['nome']	?></option><?php
		$i=$i+1;
}
?>									
									</select></td>
								</tr>
							</table>
							<tr>
								<td><input class="inputb" type=submit value=PRÓXIMA></td>
							</tr>
						</form>
					</td>	
				</tr>																				 
			</table>
		</pag>	
	</body>
</html>