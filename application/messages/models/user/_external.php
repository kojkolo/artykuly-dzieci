<?php defined('SYSPATH') or die('No direct access allowed.'); 

return array(
    'password' => array(
        'not_empty' => 'Musisz wprowadzić hasło.',
        'min_length' => 'Hasło powinno mieć co najmniej :param2 znaków.',
    ),
    'password_confirm' => array(
        'matches' => 'Podane hasła nie są identyczne.',
    )
);

