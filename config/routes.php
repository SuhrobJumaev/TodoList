<?php
return array(
    'task/page-([0-9]+)/([a-zA-Z]+)/([a-zA-Z]+)'            => 'task/index/$1/$2/$3',
    'orderByName/page-([0-9]+)/([a-zA-Z]+)/([a-zA-Z]+)'     => 'task/index/$1/$2/$3',
    'createTask'                                            => 'task/createTask',
    'editTaskText/([0-9]+)/([0-9]+)'                        => 'task/editText/$1/$2',
    'finishTask/([0-9]+)/([0-9]+)'                          => 'task/editStatus/$1/$2',
    'logout'                                                => 'auth/logout',
    'login'                                                 => 'auth/login',
    'task/page-([0-9]+)/([a-zA-Z]+)/([a-zA-Z]+)'            => 'task/index/$1/$2/$3',
    ''                                                      => 'task/index/1/id/desc',
);