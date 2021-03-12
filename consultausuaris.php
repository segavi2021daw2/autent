<?php
require'vendor/autoload.php';
use Laminas\Ldap\Ldap;
$uid= $_POST["uid"];
$unitatorganitzativa= $_POST["unitatorganitzativa"];
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
$usuari=$ldap->getEntry('uid='.$uid.',ou='.$unitatorganitzativa.',dc=fjeclot,dc=net');
echo"<b><u>".$usuari["dn"]."</b></u><br>";
foreach ($usuari as $atribut => $dada) {if ($atribut != "dn") echo $atribut.": ".$dada[0].'<br>';
}
?>