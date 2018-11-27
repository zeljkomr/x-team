<?php

/**
 * @apiGroup           Gallery
 * @apiName            deleteGallery
 *
 * @api                {DELETE} /v1/galleries/:id Delete gallery item
 * @apiDescription     Delete picture and description
 *
 * @apiVersion         1.0.0
 * @apiPermission      admin
 *
 * @apiParam           {String}  id (required)
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 204 No Content
 */

/** @var Route $router */
$router->delete('galleries/{id}', [
    'as'         => 'api_gallery_delete_gallery',
    'uses'       => 'Controller@deleteGallery',
    'middleware' => [
        'auth:api',
    ],
]);
