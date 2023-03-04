<?php

class dbConnect {

    function __construct(){

require_once('register.php');
$conn = mysql_connect(HOST,USER,PASSWORD);
mysql_select_db(DATABASE, $conn);

if(!$conn)
{
    die("cannot connect the database");

}
return $conn;
    }
}

?>