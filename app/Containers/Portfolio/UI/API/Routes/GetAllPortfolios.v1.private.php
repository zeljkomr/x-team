<?php

/**
 * @apiGroup           Portfolio
 * @apiName            Get All Portfolios
 * @api                {get} /v1/portfolios Get All Portfolios
 * @apiDescription     Get All Portfolios
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiExample {json=../../../Documentation/JSONResponses/CreatePortfolio.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->get('portfolios', [
    'as' => 'api_portfolio_get_all_portfolios',
    'uses'  => 'Controller@getAllPortfolios',
    'middleware' => [
      'auth:api',
    ],
]);
