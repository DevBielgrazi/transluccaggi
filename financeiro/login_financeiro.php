<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="imagem/favicone.png"/>
		<link href="estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
        <login>
			<img src="..\imagem/logo.png" width=25%>
			<table>
				<tr>
					<td>
<?php
    $log_adm = $_POST["log_adm"];
    $sen_adm = $_POST["sen_adm"];
    $sen_adm = md5($sen_adm);
    require('../connect.php');
    $sql = mysqli_query($conn,"SELECT * FROM $tab_usu WHERE `id` = '1' AND `login` = '$log_adm' AND `senha` = '$sen_adm'");
    $n = mysqli_num_rows($sql);
    if($n == 0)
    {
?>
    <tr>
        <td><h6>LOGIN INVÁLIDO</h6></td>
    </tr>
<?php
    }
    else
    {
//Mantendo a Sessão
        session_start();
//Finalizando a sessão
        session_destroy();
//session_unset — Libera todas as variáveis de sessão
        session_unset();
        $v = mysqli_fetch_array($sql);
        session_start();
        $_SESSION["system_control"] = 2;
        $_SESSION["id"] = $v['id'];
?>            
        <script>document.location.href="../menu.php"</script>
<?php
    }
?>
                        <tr>
                            <td><a href="index_financeiro.html"><button class="buttonc">VOLTAR</button></a></td>
                        </tr>
                    </td>
                </tr>
            </table>
        </login>
    </body>
</html>