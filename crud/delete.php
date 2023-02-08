<?php

require_once './../env.php';
require_once './../helper.php';

session_start();

if(empty($_GET['id'])){
    
    $_SESSION ['error'] = 'id not found';
 
}else{
    $connection_db = connection_db();
    $county_id =intval($_GET['id']);
    $sql = "DELETE  FROM county WHERE id = {$county_id}";
    $result = $connection_db->query($sql);  
    if($result){
        $_SESSION['success'] = 'county delete successfully!';
      
    }else{
    
        $_SESSION['error'] = 'county error sucessfully!';
      
    }
}
    header('location: '.get_root_url('crud/index.php'));
    exit;

?>
