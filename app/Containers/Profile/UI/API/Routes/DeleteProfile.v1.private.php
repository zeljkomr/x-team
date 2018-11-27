<?php

/** @var Route $router */
$router->delete('profiles/{id}', [
    'as' => 'api_profile_delete_profile',
    'uses'  => 'Controller@deleteProfile',
    'middleware' => [
      'auth:api',
    ],
]);
