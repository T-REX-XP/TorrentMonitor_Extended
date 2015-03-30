<?php
define('ROOT_DIR', str_replace('include', '', dirname(__FILE__)) );

include_once ROOT_DIR."class/System.class.php";

if ( ! Sys::checkAuth())
  die(header('Location: ../'));

include_once ROOT_DIR."class/Update.class.php";
include_once ROOT_DIR."class/rain.tpl.class.php";

// заполнение шаблона
raintpl::configure("root_dir", ROOT_DIR );
raintpl::configure("tpl_dir" , Sys::getTemplateDir() );

$tpl = new RainTPL;
$tpl->assign( "title", 'Список изменений' );
$tpl->assign( "changelog", Update::getUpdateInfo() );

$tpl->draw( 'update' );

?>
