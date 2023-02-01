<?php

require_once './../env.php';
require_once './../helper.php';

if (empty($_POST['id'])) {
    header('Location: ' . get_root_url('crud/index.php'));
    exit;
}
if (
    empty($_POST['full_name']) ||
    empty($_POST['email']) ||
    empty($_POST['village'])
) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$full_name = htmlentities($_REQUEST['full_name'], ENT_QUOTES, 'UTF-8');
$village = isset($_REQUEST['village']) ? htmlentities($_REQUEST['village'], ENT_QUOTES, 'UTF-8') : '';

$errors = [];

if (strlen($full_name) < 5 || strlen($full_name) > 10) {
    $errors[] = "full_name should be less than 5 characters or more than 10 characters";
}

if (strlen($village) < 4 || strlen($village) > 255) {
    $errors[] = "village should be less than 4 characters or more than 255 character";
}

if (empty($errors)) {
    
    $connection_db = connection_db();
    $county_id = $_POST['id'];
    $county_name = $_POST['full_name'];
    $county_email = $_POST['email'];
    $county_village = $_POST['village'];


    $sql = "UPDATE county SET full_name='{$county_name}', email='{$county_email}', village='{$county_village}' WHERE id = '{$county_id}'";
    $result = $connection_db->query($sql);

    session_start();
    $_SESSION['success'] = 'Country updated successfully!';

} else {
    session_start();
    $_SESSION['errors'] = $errors;
}

// echo "<pre>";
// print_r($_SERVER);
// echo"</pre>";

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;