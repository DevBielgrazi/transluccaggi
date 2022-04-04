<?php
    //Mantendo a Sessão
    session_start();
    //Finalizando a sessão
    session_destroy();
    //session_unset — Libera todas as variáveis de sessão
    session_unset();
 
    echo "<script>;top.location.href='index.html';</script>";        
?>