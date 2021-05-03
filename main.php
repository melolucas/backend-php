<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/model/Banco.php';

use Moovin\Job\Backend\Model;
$banco = new Model\Model;

$user = array(
    'tipoconta' => 'Corrente',
    'saldo' => 1000.00
);

$user2 = array(
    'tipoconta' => 'Poupança',
    'saldo' => 3000.00
);

echo $banco->deposito($user, 1000);
// echo $banco->saque($user, 599.50);
// echo $banco->transferencia($user, $user2, 1000.00);
