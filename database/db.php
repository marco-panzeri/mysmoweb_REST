<?php

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","mysmartopinion");

$dbc=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
if($dbc->connect_error){
    die("errore: ".$dbc->connect_error);
}
return $dbc;

?>