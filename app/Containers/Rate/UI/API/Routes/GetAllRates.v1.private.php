<?php

/**
 * @apiGroup           Rate
 * @apiName            getRates
 * @api                {get} /v1/rates Get Rate
 * @apiDescription     Get Rate
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiExample {json=../../../Documentation/JSONResponses/CreateRate.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->get('rates', [
    'as' => 'api_rate_get_all_rates',
    'uses'  => 'Controller@getAllRates',
    'middleware' => [
      'auth:api',
    ],
]);
