<?php

/** @var Route $router */
$router->get('profiles/{id}', [
    'as' => 'api_profile_find_profile_by_id',
    'uses'  => 'Controller@findProfileById',
    'middleware' => [
      'auth:api',
    ],
]);
