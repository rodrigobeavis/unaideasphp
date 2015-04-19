<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//session_start();
//session_destroy();
//session_unset();
//echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.html\">";
//exit;


session_start();
session_unset();
session_destroy();
unset($_SESSION);

if (empty($_SESSION)) {
    if (file_exists('../../index.html')) {
        header('Location: ../../index.html');
    } else {
        header('Location: ./index.html');
    }
    header("Refresh: 2; url=../../index.html");
    header("Refresh: 2; url=./index.html");
}