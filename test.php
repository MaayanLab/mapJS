<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$content = file_get_contents('php://input');

if(!empty($content)){

	echo $content;

}

?>