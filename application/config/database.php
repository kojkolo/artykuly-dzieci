<?php

defined('SYSPATH') or die('No direct script access.');

// Ustawienia bazy na serwer zewnętrzny
/*return array
    (
    'default' => array(
        'type' => 'PDO',
        'connection' => array(
            'dsn' => 'mysql:host=sql309.rf.gd;dbname=rfgd_19065037_sklep',
            'database' => 'rfgd_19065037_sklep',
            'username' => 'rfgd_19065037',
            'password' => 'kojkolo123',
            'persistent' => FALSE,
            'options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'), // SET UTF8                   
        ),
        'table_prefix' => '',
        'charset' => 'utf8',
        'caching' => TRUE,
    )*/

 // Ustawienia bazy na serwer lokalny   
return array
    (
    'default' => array
    (
        'type'       => 'MySQLi',
        'connection' => array(
            'hostname'   => 'localhost',
            'username'   => 'root',
            'password'   => '',
            'persistent' => FALSE,
            'database'   => 'sklepinternetowy',
        ),
        'table_prefix' => '',
        'charset'      => 'utf8',
    ),
);
