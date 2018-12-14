<?php

//Start Session
session_start();

require('config.php');

require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Messages.php');

require('controllers/home.php');
require('controllers/users.php');
require('controllers/shares.php');

require('models/home.php');
require('models/users.php');
require('models/shares.php');


echo 'main index <br />';
$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createcontroller();
if($controller){
	$controller->executeAction();
}
?>