<?php

// Подключаем клиент Google таблиц
require_once __DIR__ . '/vendor/autoload.php';
require_once 'Database.php';


$db = new Database();
// Наш ключ доступа к сервисному аккаунту
//$googleAccountKeyFilePath = __DIR__ . '/service_key.json';
$googleAccountKeyFilePath = __DIR__ . '/client_secret.json';
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $googleAccountKeyFilePath);

// Создаем новый клиент
$client = new Google_Client();
// Устанавливаем полномочия
$client->useApplicationDefaultCredentials();

// Добавляем область доступа к чтению, редактированию, созданию и удалению таблиц
$client->addScope(['https://www.googleapis.com/auth/drive', 'https://www.googleapis.com/auth/spreadsheets']);

$service = new Google_Service_Sheets($client);

// ID таблицы
$spreadsheetId = '1YnAfLU3fT_mePdwJow7--nAFxj8JAogwZEbFQaURGsU';

$range = 'A1:B1:C1:D1';
$valueRange= new Google_Service_Sheets_ValueRange();
$valueRange->setValues(["values" => $db->read()]);
$conf = ["valueInputOption" => "RAW"];
//$values = [
//    [
//        'ass',
//        'ass@test.com',
//    ],
//    [
//        'Jass Waugh',
//        'ass@test.com',
//    ],
//    // Additional rows ...
//];
//$body = new Google_Service_Sheets_ValueRange([
////    'values' => $values
//    'values' => $db->read()
//]);
//$params = [
//    'valueInputOption' => 'USER_ENTERED'
//];
//$result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
$result = $service->spreadsheets_values->append($spreadsheetId, $range, $valueRange, $conf);
printf("%d cells appended.", $result->getUpdates()->getUpdatedCells());