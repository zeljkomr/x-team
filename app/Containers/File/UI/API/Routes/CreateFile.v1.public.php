<?php

/**
 * @apiGroup           File
 * @apiName            createFile
 *
 * @api                {POST} /v1/files Create files
 * @apiDescription     Create files
 *
 * @apiVersion         1.0.0
 * @apiPermission      admin
 *
 * @apiParam           {Array}  files[] (required) Multiple files to add
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    "data": [
        {
            "object": "File",
            "id": "qmgj7req7dpakw85",
            "path": "public/files/1530264542_1.png",
            "description": null,
            "created_at": {
                "date": "2018-06-29 09:29:02.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2018-06-29 09:29:02.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "real_id": 13
        },
        {
            "object": "File",
            "id": "3mraxje7ldqv5wyb",
            "path": "public/files/1530264542_2.png",
            "description": null,
            "created_at": {
                "date": "2018-06-29 09:29:02.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2018-06-29 09:29:02.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "real_id": 14
        },
        {
            "object": "File",
            "id": "z5x8vq6v0e94b037",
            "path": "public/files/1530264542_3.png",
            "description": null,
            "created_at": {
                "date": "2018-06-29 09:29:02.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2018-06-29 09:29:02.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "real_id": 15
        },
        {
            "object": "File",
            "id": "wrvql06ladp3mzx9",
            "path": "public/files/1530264542_4.png",
            "description": null,
            "created_at": {
                "date": "2018-06-29 09:29:02.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2018-06-29 09:29:02.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "real_id": 16
        },
        {
            "object": "File",
            "id": "04qrnzdxpe5moxkv",
            "path": "public/files/1530264542_5.png",
            "description": null,
            "created_at": {
                "date": "2018-06-29 09:29:02.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2018-06-29 09:29:02.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "real_id": 17
        }
    ],
    "meta": {
        "include": [],
        "custom": []
    }
}
 */

/** @var Route $router */
$router->post('files', [
    'as'         => 'api_file_create_file',
    'uses'       => 'Controller@createFile',
    'middleware' => [
        'auth:api',
    ],
]);
