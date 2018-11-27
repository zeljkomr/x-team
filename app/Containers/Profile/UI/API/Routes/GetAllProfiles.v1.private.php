<?php

/** @var Route $router */
$router->get('profiles', [
    'as' => 'api_profile_get_all_profiles',
    'uses'  => 'Controller@getAllProfiles',
    'middleware' => [
      'auth:api',
    ],
]);
