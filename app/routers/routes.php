<?php

return [
    '/' => 'Home@index',
    '/user' => 'User@index',
    '/user/create' => 'User@create',
    '/user/update/[0-9]+'=> 'User@update',
    '/user/delete/[0-9]+'=> 'User@delete'
];