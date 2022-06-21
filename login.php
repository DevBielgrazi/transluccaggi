<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="imagem/favicone.png"/>
		<link href="estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
<?php
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    require("connect.php");
    $sql = mysqli_query($conn,"SELECT * FROM $tab_usu WHERE `login` = '$login'");
    $n = mysqli_num_rows($sql);
    if($n == 0)
    {
?>
    <script>alert("LOGIN INVÁLIDO!");
                    window.history.back()</script>
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
            <script>alert("SENHA INVÁLIDA!");
                    window.history.back()</script>
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
    </body>
</html>