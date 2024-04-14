<?php

// incluir os códigos no ficheiro config.php
require 'config.php';

/*

data source name format: "mysql:host=host_name;dbname=db_name;charset=UTF8"

No caso desse exemplo o DSN seria: "mysql:host=localhost;dbname=escola;charset=UTF8"

*/

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

/*

informações sobre PDO:

	https://www.devmedia.com.br/introducao-ao-php-pdo/24973

Informações sobre o Try - Catch:

	https://www.devmedia.com.br/javascript-try-catch/41019

*/

try {
	// É onde acontece a conexão na realidade
	$pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
	echo $e->getMessage();
}
