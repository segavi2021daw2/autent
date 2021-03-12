<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);
	#
	# Atribut a modificar --> Número d'idenficador d'usuari
	#
	$atribut= $_POST["atr"];
	$nou_contingut= $_POST["nouvalor"];
	$uid= $_POST["uid"];
	$unorg= $_POST["unitatorganitzativa"];
	//$atribut='uidNumber'; # El número identificador d'usuar té el nom d'atribut uidNumber
	
	
	#
	# Entrada a modificar
	#
	
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
	# Modificant l'entrada
	#
	$ldap = new Ldap($opcions);
	$ldap->bind();
	$entrada = $ldap->getEntry($dn);
	if ($entrada){
		Attribute::setAttribute($entrada,$atribut,$nou_contingut);
		$ldap->update($dn, $entrada);
		echo "Atribut modificat"; 
	} else echo "<b>Aquesta entrada no existeix</b><br><br>";	
?>