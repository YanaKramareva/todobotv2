<?php

require "../vendor/autoload.php";

$data = json_decode(file_get_contents('php://input'), true);

$app = new \App\App(new \App\Transport());

$app->index($data['message'], $data['message']['chat']['id']);

//подготвить интерфейс на вывод
//собирать данные для вывода
