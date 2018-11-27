<?php

/**
 * @apiGroup           Rate
 * @apiName            deleteRate
 *
 * @api                {DELETE} /v1/rates/:id Delete rate
 * @apiDescription     Delete rate by id
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  id (required)
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 204 No Content
 */

/** @var Route $router */
$router->delete('rates/{id}', [
    'as' => 'api_rate_delete_rate',
    'uses'  => 'Controller@deleteRate',
    'middleware' => [
      'auth:api',
    ],
]);
