<?php 
require_once('destruyesesiones.php');

session_start();
destroySession();
header('Location: index.php');
exit;?>