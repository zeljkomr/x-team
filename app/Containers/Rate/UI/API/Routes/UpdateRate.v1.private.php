<?php

/**
 * @apiGroup           Rate
 * @apiName            updateRate
 * @api                {post} /v1/rates Update Rate
 * @apiDescription     Update Rate
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
$router->patch('rates/{id}', [
    'as' => 'api_rate_update_rate',
    'uses'  => 'Controller@updateRate',
    'middleware' => [
      'auth:api',
    ],
]);
