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
    
    if(!isset($_POST['log_adm'])) {
        $log_adm = "nul";
    }else{
        $log_adm = $_POST["log_adm"];
    }

    if(!isset($_POST['sen_adm'])) {
        $sen_adm = "nul";
    }else{
        $sen_adm = $_POST["sen_adm"];
    }
    
    require("connect.php");
    $sql = mysqli_query($conn,"SELECT * FROM $tab_usu");
    $n = mysqli_num_rows($sql);
    if ($n != 0){
        $sen_adm = md5($sen_adm);
        $sql2 = mysqli_query($conn,"SELECT * FROM $tab_usu WHERE `id` = '1' AND `login` = '$login' AND `senha` = '$sen_adm'");
        $n2 = mysqli_num_rows($sql);
        if($n2 == 0)
        {
?>
            <tr>
                <td><h6>SENHA DE ADMINISTRADOR INVÁLIDA</h6></td>
            </tr>
<?php
        }
        else
        {
            $sql = mysqli_query($conn,"INSERT INTO $tab_usu(`login`, `senha`) VALUES ('$login', '$senha')");
?>            
            <script>document.location.href="index.html"</script>
<?php
        }
    }
    else
    {
        $sql = mysqli_query($conn,"INSERT INTO $tab_usu(`login`, `senha`) VALUES ('$login', '$senha')");
?>            
        <script>document.location.href="index.html"</script>
<?php
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