<?php

namespace config;
return [

    '' => [
        'controller' => 'Home',
        'action' => 'Advertising'
    ],

    'main' => [
        'controller' => 'Home',
        'action' => 'Index'
    ],
    'main/{page:\d+}' => [
        'controller' => 'Home',
        'action' => 'Index'
    ],
    'load\?.*' => [
        'controller' => 'Home',
        'action' => 'LoadApartment'
    ],
    'apartment\?.*' => [
        'controller' => 'Home',
        'action' => 'ShowApartment'
    ],
    'registration' => [
        'controller' => 'Account',
        'action' => 'registration'
    ],
    'login' => [
        'controller' => 'Account',
        'action' => 'login'
    ],
    'account/confirm/{token:\w+}' => [
        'controller' => 'Account',
        'action' => 'confirm',
    ],
    'logout' => [
        'controller' => 'Account',
        'action' => 'logOut'
    ],
    'account/recovery' => [
        'controller' => 'Account',
        'action' => 'recovery',
    ],
    'account/reset/{token:\w+}' => [
        'controller' => 'Account',
        'action' => 'reset',
    ],
    'addFavourite\?.*' => [
        'controller' => 'Home',
        'action' => 'AddFavourite'
    ],
    'favourite' => [
        'controller' => 'Home',
        'action' => 'ShowFavourite'
    ],
    'removeFavourite\?.*' => [
        'controller' => 'Home',
        'action' => 'RemoveFavourite'
    ],
    'admin' => [
        'controller' => 'Admin',
        'action' => 'Index'
    ],

    'Admin/SaveApartment' => [
        'controller' => 'Admin',
        'action' => 'saveApartment'
    ],

    'Admin/DeleteApartment' => [
        'controller' => 'Admin',
        'action' => 'deleteApartment'
    ],
    'Admin/CreateApartment' => [
        'controller' => 'Admin',
        'action' => 'createApartment'
    ],
    'admin/users' => [
        'controller' => 'Admin',
        'action' => 'showUsers'
    ],
    'Admin/SaveUser' => [
        'controller' => 'Admin',
        'action' => 'saveUser'
    ],

    'Admin/DeleteUser' => [
        'controller' => 'Admin',
        'action' => 'deleteUser'
    ],
    'Admin/CreateUser' => [
        'controller' => 'Admin',
        'action' => 'createUser'
    ],




];