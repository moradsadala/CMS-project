<?php
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_password'] = '';
$db['db_name'] = 'cms';

foreach($db as $key => $value){

    define(strtoupper($key),$value);

}





$db_connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if($db_connection){
    //echo "WE ARE CONNECTED";

}else{
    echo "CONNECTION FAILED !!!!!!";
}


?>