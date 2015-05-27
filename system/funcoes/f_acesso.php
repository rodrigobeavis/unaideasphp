<?php
if ($area_user != $usuarios_autorizados) {   
    unset($_SESSION);
    session_destroy();
    echo '<script>alert("Você tentou acessar uma area restrita!");</script>';
    header("refresh: 0; url=index.php");
}
