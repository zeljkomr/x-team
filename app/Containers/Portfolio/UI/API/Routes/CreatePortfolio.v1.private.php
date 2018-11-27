<?php

/**
 * @apiGroup           Portfolio
 * @apiName            Create Portfolio
 * @api                {post} /v1/portfolios Create Portfolio
 * @apiDescription     Create Portfolio
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  name (required)
 * @apiParam           {String}  description (required)
 * @apiParam           {String}  scale (required)
 * @apiParam           {String}  url (required)
 * @apiParam           {Object[]} rates (required) Multiple pictures
 *
 * @apiExample {json=../../../Documentation/JSONResponses/CreatePortfolio.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->post('portfolios', [
    'as' => 'api_portfolio_create_portfolio',
    'uses'  => 'Controller@createPortfolio',
    'middleware' => [
      'auth:api',
    ],
]);
