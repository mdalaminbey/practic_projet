<?php

require_once './../env.php';

require_once './../helper.php';

$connection_db = connection_db();

$count_db_create_query = "CREATE TABLE IF NOT EXISTS COUNTY (
	id int NOT NULL AUTO_INCREMENT,
	full_name varchar(100) NOT NULL,
	email varchar(100) NOT NULL UNIQUE,
	village varchar(255),
	PRIMARY KEY (id)
)";

$result = $connection_db->query( $count_db_create_query );

if ( !$result ) {
    printf( "Could not create table: %s<br/>", $connection_db->error );
}else{
    echo "sucessfull create table agent";
}

