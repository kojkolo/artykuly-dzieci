<?php defined('SYSPATH') or die('No direct access allowed.'); 

return array(
    'username' => array(
        'unique' => 'Nazwa użytkownika jest już zajęta.',
        'not_empty' => 'Pole wymagane.',
        'max_length' => 'Nazwa użytkownika może zawierać co najwyżej :param2 znaków.',
    ),
    'name' => array(
        'not_empty' => 'Musisz wprowadzić imię.',
        'max_length' => 'Imię może zawierać co najwyżej :param2 znaków.',
    ),
    'surname' => array(
        'not_empty' => 'Musisz wprowadzić nazwisko.',
        'max_length' => 'Nazwisko może zawierać co najwyżej :param2 znaków.',
    ),
    'password' => array(
        'not_empty' => 'Musisz wprowadzić hasło.',
    ),
    'email' => array (
        'not_empty' => 'Musisz podać email.',
        'email' => 'Należy podać istniejący adres email.',
        'unique' => 'Email jest już wykorzystany.',
    )
);
