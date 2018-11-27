<?php

/**
 * @apiGroup           Contact
 * @apiName            Create Contact
 * @api                {post} /v1/contacts/:profile_id Create Contact
 * @apiDescription     Create Contact
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {Object[]} contacts
 * @apiParam           {String}  contacts.contact (required)
 * @apiParam           {String}  contacts.type (required) web,video,mobile
 *
 * @apiExample {json=../../../Documentation/JSONResponses/CreateContact.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->post('contacts', [
    'as' => 'api_contact_create_contact',
    'uses'  => 'Controller@createContact',
    'middleware' => [
      'auth:api',
    ],
]);
