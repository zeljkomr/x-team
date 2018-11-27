<?php

/**
 * @apiGroup           Profile
 * @apiName            Update Profile
 * @api                {put} /v1/profiles/:id Update Profile
 * @apiDescription     Update Profile
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  id (required)
 * @apiParam           {String}  description (optional)
 * @apiParam           {String}  title (optional)
 *
 * @apiExample {json=../../../Documentation/JSONResponses/UpdateProfile.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->put('profiles/{id}', [
    'as' => 'api_profile_update_profile',
    'uses'  => 'Controller@updateProfile',
    'middleware' => [
      'auth:api',
    ],
]);
