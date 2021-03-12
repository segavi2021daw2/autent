<?php 


require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);

$uid= $_POST["uid"];
$unitatorganitzativa= $_POST["unitatorganitzativa"];
$uidNumber= $_POST["uidNumber"];
$gidNumber= $_POST["gidNumber"];
$directoripersonal= $_POST["directoripersonal"];
$shell= $_POST["shell"];
$cn= $_POST["cn"];
$sn= $_POST["sn"];
$givenName= $_POST["givenName"];
$PostalAdress= $_POST["PostalAdress"];
$mobile= $_POST["mobile"];
$telephoneNumber= $_POST["telephoneNumber"];
$title= $_POST["title"];
$description= $_POST["description"];
$objcl=array('inetOrgPerson','organizationalPerson','person','posixAccount','shadowAccount','top');


#
#Afegint la nova entrada
$domini = 'dc=fjeclot,dc=net';
$opcions = [
    'host' => 'zend-segavi.fjeclot.net',
    'username' => "cn=admin,$domini",
    'password' => 'fjeclot',
    'bindRequiresDn' => true,
    'accountDomainName' => 'fjeclot.net',
    'baseDn' => 'dc=fjeclot,dc=net',
];
$ldap = new Ldap($opcions);
$ldap->bind();
$nova_entrada = [];
Attribute::setAttribute($nova_entrada, 'uid', $uid);
Attribute::setAttribute($nova_entrada, 'objectClass', $objcl);
Attribute::setAttribute($nova_entrada, 'ou', $unitatorganitzativa);
Attribute::setAttribute($nova_entrada, 'uidNumber', $uidNumber);
Attribute::setAttribute($nova_entrada, 'gidNumber', $gidNumber);
Attribute::setAttribute($nova_entrada, 'homeDirectory', $directoripersonal);
Attribute::setAttribute($nova_entrada, 'loginShell', $shell);
Attribute::setAttribute($nova_entrada, 'cn', $cn);
Attribute::setAttribute($nova_entrada, 'sn', $sn);
Attribute::setAttribute($nova_entrada, 'givenName', $givenName);
Attribute::setAttribute($nova_entrada, 'mobile', $mobile);
Attribute::setAttribute($nova_entrada, 'postalAddress', $PostalAdress);
Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telephoneNumber);
Attribute::setAttribute($nova_entrada, 'title', $title);
Attribute::setAttribute($nova_entrada, 'description', $description);

$dn = 'uid='.$uid.',ou='.$unitatorganitzativa.',dc=fjeclot,dc=net';
if($ldap->add($dn, $nova_entrada)) echo "Usuari creat correctament";
?>




















?>