<?php

/**
 * @apiGroup           File
 * @apiName            deleteFile
 *
 * @api                {DELETE} /v1/files/:id Delete file
 * @apiDescription     Delete file by id
 *
 * @apiVersion         1.0.0
 * @apiPermission      admin
 *
 * @apiParam           {String}  id (required) Hashed id
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 204 No Content
 */

/** @var Route $router */
$router->delete('files', [
    'as'         => 'api_file_delete_file',
    'uses'       => 'Controller@deleteFile',
    'middleware' => [
        'auth:api',
    ],
]);
