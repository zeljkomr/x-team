<?php

/**
 * @apiGroup           Portfolio
 * @apiName            deletePortfolio
 *
 * @api                {DELETE} /v1/portfolios/:id Delete Portfolio
 * @apiDescription     Delete Portfolio
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 204 No Content
 */

/** @var Route $router */
$router->delete('portfolios/{id}', [
    'as' => 'api_portfolio_delete_portfolio',
    'uses'  => 'Controller@deletePortfolio',
    'middleware' => [
      'auth:api',
    ],
]);
