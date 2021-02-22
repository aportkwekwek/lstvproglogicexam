<?php


// other connection string
$pay_host = 'localhost';		
$pay_uname = 'root';
$pay_pw = '';
$pay_dbname = 'lstventuressqlexam';
$pay_cnstr = "mysql:host=$pay_host; dbname=$pay_dbname;charset=utf8";
$pay_opt = array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY=>true,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");

$link_id = new PDO($pay_cnstr, $pay_uname, $pay_pw, $pay_opt);


// connectionstring for employee db
$pay_host = 'localhost';		
$pay_uname = 'root';
$pay_pw = '';
$pay_dbname = 'employeedb';
$pay_cnstr = "mysql:host=$pay_host; dbname=$pay_dbname;charset=utf8";
$pay_opt = array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY=>true,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");

$link_id_employeefile = new PDO($pay_cnstr, $pay_uname, $pay_pw, $pay_opt);


?>