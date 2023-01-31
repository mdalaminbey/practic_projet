
<?php
include_once './../env.php';

if(
    empty($_POST['full_name']) || 
    empty($_POST['email']) || 
    empty($_POST['village']) 
) {
    header("http://localhost/nuraalam/practic_projet/crud/index.php");
    exit;
}

$connection_db = connection_db();

$county_id     = $_POST['id'];
$county_name     = $_POST['full_name'];
$county_email = $_POST['email'];
$county_village   = $_POST['village'];


$sql      = "UPDATE county SET full_name='{$county_name }', email='{$county_email}', village='{$$county_village}' WHERE id = {$county_id}";
$result   = $connection_db->query($sql);

header("http://localhost/nuraalam/practic_projet/crud/index.php");
exit;
 