<?php

/**
 * @apiGroup           Contact
 * @apiName            Update Contact
 * @api                {put} /v1/contacts/:id Update Contact
 * @apiDescription     Update Contact by ID
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  id (required)
 * @apiParam           {String}  contact (optional)
 * @apiParam           {String}  type (optional) web,video,mobile
 *
 * @apiExample {json=../../../Documentation/JSONResponses/UpdateContact.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->put('contacts/{id}', [
    'as' => 'api_contact_update_contact',
    'uses'  => 'Controller@updateContact',
    'middleware' => [
      'auth:api',
    ],
]);
