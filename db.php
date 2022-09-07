<?php
$mySQLserver = "localhost";
	$mySQLuser = "root";
	$mySQLpassword = "";
	$mySQLdefaultdb = "saas_encrypt_client";
	$host = "localhost/saas_encrypt_client/";
	$folderweb="";
	$webhook = $host."webhook/";

$link = mysqli_connect($mySQLserver, $mySQLuser, $mySQLpassword,$mySQLdefaultdb) or die ("Could not connect to MySQL");

?>