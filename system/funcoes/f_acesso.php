<?php
//var_dump($usuarios_autorizados);
//var_dump($area_user);
//var_dump(!in_array($area_user, $usuarios_autorizados));

if (!in_array($area_user, $usuarios_autorizados)) {   
    unset($_SESSION);
    session_destroy();
    header("refresh: 0; url=index.php");
    echo '<script>alert("Você tentou acessar uma area restrita!");</script>';
    
}
