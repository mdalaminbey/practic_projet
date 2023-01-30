<?php
function my_env($key)
{
    $values = [
        'domain'    => 'http://localhost/nuraalam/practic_projet/',
        'db_host'    => 'localhost',
        'db_username' => 'root',
        'db_password' => '',
        'db_name' => 'student_details'           
    ];
    return isset( $values[$key] ) ? $values[$key] : false;
}
