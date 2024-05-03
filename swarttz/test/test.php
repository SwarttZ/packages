<?php
require_once 'vendor/autoload.php';

use Swarttz\Test\Model\UserModel;

$user = new UserModel();

//dd(['All' => $user->getAll()]);
dd(['ID' => $user->findById(1)]);
