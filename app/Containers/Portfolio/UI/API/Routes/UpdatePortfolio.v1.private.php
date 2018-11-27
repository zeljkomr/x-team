<?php

/**
 * @apiGroup           Portfolio
 * @apiName            Update Portfolio
 * @api                {patch} /v1/portfolios/:id Update Portfolio
 * @apiDescription     Update Portfolio
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  name (required)
 * @apiParam           {String}  description (required)
 * @apiParam           {String}  scale (required)
 * @apiParam           {String}  url (required)
 *
 * @apiExample {json=../../../Documentation/JSONResponses/UpdatePortfolio.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->patch('portfolios/{id}', [
    'as' => 'api_portfolio_update_portfolio',
    'uses'  => 'Controller@updatePortfolio',
    'middleware' => [
      'auth:api',
    ],
]);
