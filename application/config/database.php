<?php

defined('SYSPATH') or die('No direct script access.');

// Ustawienia bazy na serwer zewnętrzny
return array
    (
    'default' => array
    (
        'type'       => 'MySQLi',
        'connection' => array(
            'hostname'   => 'sql309.rf.gd',
            'username'   => 'rfgd_19065037',
            'password'   => 'kojkolo123',
            'persistent' => FALSE,
            'database'   => 'rfgd_19065037_sklep',
        ),
        'table_prefix' => '',
        'charset'      => 'utf8',
    ),
);
/*
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
);*/
