<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="imagem/favicone.png"/>
		<link href="estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('connect.php');
#VARIÁVEIS DO FORMULÁRIO
    $login = trim($_POST['login']);
    $senha = trim($_POST['senha']);
    $senha2 = trim($_POST['senha2']);
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_usu WHERE `login` = '$login'");
#TRANSFORMANDO RESULTADO EM NUMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
	if($n != 0){
?>
			<pag>
				<h1>FAZER CADASTRO</h1><p>
				<table>
					<tr>
						<td><h6>USUÁRIO JÁ CADASTARDO</h6></td>
					</tr>
					<tr>
						<td><a href="index.html"><button class="buttonc">FAZER LOGIN</button></a></td>
					</tr>
				</table>
			</pag>
<?php
	}
	else
	{
		if($senha==$senha2){
#INSERINDO DADOS NA TABELA
			$senha = md5($senha);
			$sql = mysqli_query($conn,"INSERT INTO $tab_usu(`login`, `senha`) VALUES ('$login', '$senha')");
?>
				<pag>
					<h1>FAZER CADASTRO</h1><p>
					<table>
						<tr>
							<td><h7>CADASTRO REALIZADO</h7></td>
						</tr>
						<tr>
							<td><a href="index.html"><button class="buttonc">FAZER LOGIN</button></a></td>
						</tr>
					</table>
				</pag>
<?php
		}else{
?>
			<pag>
				<h1>FAZER CADASTRO</h1><p>
				<table>
					<tr>
						<td><h5>SENHAS DIVERGENTES</h5></td>
					</tr>
					<tr>
						<td>
							<form method="post" action="cadastrar_usuario.php">
								<table>
									<tr>
										<td><h4>LOGIN:</h4></td>
										<td><input name="login" type=text size=16 maxlength=16 required></td>
									</tr>
									<tr>
										<td><h4>SENHA:</h4></td>
										<td><input name="senha" type=password size=16 maxlength=16 required></td>
									</tr>
									<tr>
										<td><h4>CONFIRMAR SENHA:</h4></td>
										<td><input name="senha2" type=password size=16 maxlength=16 required></td>
									</tr>
								</table>
								<tr>
									<td><input class="inputb" type=submit value=CADASTRAR></td>
								</tr>
							</form>
						</td>
					</tr>
				</table>
			</pag>
<?php		
		}
	}
?>
	</body>
</html>