<?php

/**
 * @apiGroup           Contact
 * @apiName            deleteContact
 *
 * @api                {DELETE} /v1/contacts/:id Delete contact details
 * @apiDescription     Delete contact details
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  id (required)
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 204 No Content
 */

/** @var Route $router */
$router->delete('contacts/{id}', [
    'as' => 'api_contact_delete_contact',
    'uses'  => 'Controller@deleteContact',
    'middleware' => [
      'auth:api',
    ],
]);
