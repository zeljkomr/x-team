<?php

/**
 * @apiGroup           Contact
 * @apiName            Get All Contacts
 * @api                {get} /v1/contacts Get All Contact
 * @apiDescription     Get All Contact
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiExample {json=../../../Documentation/JSONResponses/GetAllContacts.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->get('contacts', [
    'as' => 'api_contact_get_all_contacts',
    'uses'  => 'Controller@getAllContacts',
    'middleware' => [
      'auth:api',
    ],
]);
