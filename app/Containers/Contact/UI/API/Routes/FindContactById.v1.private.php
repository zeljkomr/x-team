<?php

/**
 * @apiGroup           Contact
 * @apiName            Find Contact
 * @api                {get} /v1/contacts/:id Find Contact by id
 * @apiDescription     Find Contact by ID
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  id (required)
 *
 * @apiExample {json=../../../Documentation/JSONResponses/FindContact.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->get('contacts/{id}', [
    'as' => 'api_contact_find_contact_by_id',
    'uses'  => 'Controller@findContactById',
    'middleware' => [
      'auth:api',
    ],
]);
