<?php
require_once 'vendor/autoload.php';
require_once 'src/Base.php';

use Swarttz\Test\Base;

$base = new Base();

$con = $base->run()->getConnection();

$query = $con->prepare('select * from users');
$query->execute();

$f = $query->fetchAll(PDO::FETCH_ASSOC);

$data = array_map(function ($item) {
    return $item;
}, $f);

echo "<h1>Teste de classes abstrações PHP</h1><hr>";
echo 'Nome: ' . $data[0]['name'] . '<br>' . 'email: ' . $data[0]['email'] . PHP_EOL;
