<?php

/**
 * @apiGroup           File
 * @apiName            updateFile
 *
 * @api                {PATCH} /v1/files/:id Update file description
 * @apiDescription     Update file by id
 *
 * @apiVersion         1.0.0
 * @apiPermission      admin
 *
 * @apiParam           {String}  id Hashed id
 *
 * @apiParam           {String}  description (required)
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    "data": {
        "object": "File",
        "id": "krlg04dza6o3nw58",
        "path": "public/files/1530263447_1.png",
        "description": "description must be at least 10 characters",
        "created_at": {
            "date": "2018-06-29 09:10:47.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
            "date": "2018-06-29 09:40:28.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "real_id": 6
    },
    "meta": {
        "include": [],
        "custom": []
    }
}
 */

/** @var Route $router */
$router->patch('files/{id}', [
    'as'         => 'api_file_update_file',
    'uses'       => 'Controller@updateFile',
    'middleware' => [
        'auth:api',
    ],
]);
