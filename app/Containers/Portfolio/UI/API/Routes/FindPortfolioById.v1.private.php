<?php

/**
 * @apiGroup           Portfolio
 * @apiName            Get Portfolio
 * @api                {get} /v1/portfolios/:id Get Portfolio
 * @apiDescription     Get Portfolio
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiExample {json=../../../Documentation/JSONResponses/CreatePortfolio.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->get('portfolios/{id}', [
    'as' => 'api_portfolio_find_portfolio_by_id',
    'uses'  => 'Controller@findPortfolioById',
    'middleware' => [
      'auth:api',
    ],
]);
