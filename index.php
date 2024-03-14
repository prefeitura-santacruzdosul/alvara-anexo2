<?php
/**
 * substituindo a antiga
 * function __autoload($c)
 * para rodar no php 8
 */

spl_autoload_register('myAutoloader');

function myAutoloader($c)
{
    $p = ['app.widgets','anexo2','app.fpdf'];
    foreach($p as $d)
    {
        if(file_exists("{$d}/{$c}.class.php"))
        {
            include_once("{$d}/{$c}.class.php");
            return;
        }
    }
}
TApplication::run();
?>