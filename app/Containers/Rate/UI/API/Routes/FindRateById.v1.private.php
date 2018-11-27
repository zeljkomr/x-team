<?php

/**
 * @apiGroup           Rate
 * @apiName            findRate
 * @api                {get} /v1/rates/:id Find Rate
 * @apiDescription     Find Rate
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String} id (required)
 *
 * @apiExample {json=../../../Documentation/JSONResponses/CreateRate.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->get('rates/{id}', [
    'as' => 'api_rate_find_rate_by_id',
    'uses'  => 'Controller@findRateById',
    'middleware' => [
      'auth:api',
    ],
]);
