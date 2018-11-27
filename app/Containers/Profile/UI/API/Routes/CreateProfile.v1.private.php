<?php

/**
 * @apiGroup           Profile
 * @apiName            Create Profile
 * @api                {post} /v1/profiles Create Profile
 * @apiDescription     Create Profile
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  description (required)
 * @apiParam           {String}  title (required)
 *
 * @apiExample {json=../../../Documentation/JSONResponses/CreateProfile.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->post('profiles', [
    'as' => 'api_profile_create_profile',
    'uses'  => 'Controller@createProfile',
    'middleware' => [
      'auth:api',
    ],
]);
