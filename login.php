<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="imagem/favicone.png"/>
		<link href="estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
        <login>
			<img src="imagem/logo.png" width=30%>
			<table>
				<tr>
					<td>
<?php
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    require("connect.php");
    $sql = mysqli_query($conn,"SELECT * FROM $tab_usu WHERE `login` = '$login'");
    $n = mysqli_num_rows($sql);
    if($n == 0)
    {
?>
    <script>alert("SENHA INVÁLIDA!")</script>
<?php
    }
    else
    {
        $senha = md5($senha);
        $sql = mysqli_query($conn,"SELECT * FROM $tab_usu WHERE `login` = '$login' AND `senha` = '$senha'");
        $n = mysqli_num_rows($sql);
        if($n == 0)
        {
?>
            <script>alert("SENHA INVÁLIDA!")</script>
<?php
        }    
        else
        {
            $v = mysqli_fetch_array($sql);
            session_start();
            $_SESSION["system_control"] = 1;
            $_SESSION["id"] = $v['id'];
?>            
            <script>document.location.href="menu.php"</script>
<?php
        }
    }
?>
                        <tr>
                            <td><a href="index.html"><button class="buttonc">VOLTAR</button></a></td>
                        </tr>
                    </td>
                </tr>
            </table>
        </login>
    </body>
</html>