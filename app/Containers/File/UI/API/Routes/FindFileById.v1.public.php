<?php

/**
 * @apiGroup           File
 * @apiName            findFileById
 *
 * @api                {GET} /v1/files/:id Get single file
 * @apiDescription     Get file by id
 *
 * @apiVersion         1.0.0
 * @apiPermission      admin
 *
 * @apiParam           {String}  id (required) Hashed id
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    "data": {
        "object": "File",
        "id": "pkrmzw6wae0l4a8q",
        "path": "public/files/1530263447_1.png",
        "description": null,
        "created_at": {
            "date": "2018-06-29 09:10:47.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
            "date": "2018-06-29 09:20:41.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "real_id": 5
    },
    "meta": {
        "include": [],
        "custom": []
    }
}
 */

/** @var Route $router */
$router->get('files/{id}', [
    'as'         => 'api_file_find_file_by_id',
    'uses'       => 'Controller@findFileById',
    'middleware' => [
        'auth:api',
    ],
]);
