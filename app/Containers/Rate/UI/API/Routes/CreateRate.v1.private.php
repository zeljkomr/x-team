<?php

/**
 * @apiGroup           Rate
 * @apiName            createRate
 * @api                {post} /v1/rates Create Rate
 * @apiDescription     Create Rate
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {Object[]} rates
 * @apiParam           {String}  rates.hourly_rate (required)
 * @apiParam           {String}  rates.minimum_hour (required) Should have options in numbers, and also Full-time - to discuss
 * @apiParam           {String}  rates.rate_comment (required)
 *
 * @apiExample {json=../../../Documentation/JSONResponses/CreateRate.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->post('rates', [
    'as' => 'api_rate_create_rate',
    'uses'  => 'Controller@createRate',
    'middleware' => [
      'auth:api',
    ],
]);
