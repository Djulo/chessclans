<?php


return [
  'database' => [
    'name' => 'chessclans',
    'username' => 'root',
    'password' => 'admin',
    'connection' => 'mysql:host=localhost',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];