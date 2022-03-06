<?php
require_once 'Database.php';

$db = new Database();

if (!empty($_POST['form_data']) && $_POST['action'] == 'btn_save') {
    $form_data = null;
    parse_str($_POST['form_data'], $form_data);
    $firstName = $form_data['first_name'];
    $secondName = $form_data['second_name'];
    $age = $form_data['age'];
    $db->insert($firstName,$secondName,$age);

//    if ($db->insert($firstName,$secondName,$age)) {
//        return json_encode(['OK' => 'Данные успешно добавлены']);
//    } else {
//        return json_encode(['ERROR' => 'Ошибка добавления данных']);
//    }
}