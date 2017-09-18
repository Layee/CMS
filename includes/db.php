<?php

   $db['db_host'] = 'localhost';
   $db['db_user'] = 'root';
   $db['db_pass'] = 'Tedium';
   $db['db_name'] = 'cms';

// loop throug the array and covert to constant

  foreach ($db as $key => $value) {
  	define(strtoupper($key),$value);
  }

   $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!$connect) {
    	die("Error connecting to the database");
    }

   return $connect;
?>
