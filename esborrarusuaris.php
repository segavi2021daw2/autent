<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);
	#
	# Entrada a esborrar: usuari 3 creat amb el projecte zendldap2
	#
	$uid= $_POST["uid"];
	$unorg= $_POST["unitatorganitzativa"];
	
	$dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
	#
	#Opcions de la connexió al servidor i base de dades LDAP
	$opcions = [
		'host' => 'zend-segavi.fjeclot.net',
		'username' => 'cn=admin,dc=fjeclot,dc=net',
		'password' => 'fjeclot',
		'bindRequiresDn' => true,
		'accountDomainName' => 'fjeclot.net',
		'baseDn' => 'dc=fjeclot,dc=net',		
	];
	#
	# Esborrant l'entrada
	#
	$ldap = new Ldap($opcions);
	$ldap->bind();
	if ($ldap->delete($dn))	echo "<b>Entrada esborrada</b><br>"; 
	else echo "<b>Aquesta entrada no existeix</b><br>";	
?>