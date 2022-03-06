<?php
require_once 'Database.php';

$db = new Database();

if (!empty($_POST['form_data']) && $_POST['action'] == 'btn_save') {
    $form_data = null;
    parse_str($_POST['form_data'], $form_data);
    $firstName = $form_data['first_name'];
    $secondName = $form_data['second_name'];
    $age = $form_data['age'];

    if (!empty($firstName) && !empty($secondName) && !empty($age)) {
        if ($db->insert($firstName, $secondName, $age)) {
            echo json_encode('Данные успешно добавлены');
        }
    } else {
        echo json_encode('Все поля должны быть заполнены');
    }
}