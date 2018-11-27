<?php

/**
 * @apiGroup           File
 * @apiName            getAllFiles
 *
 * @api                {GET} /v1/files Get all files
 * @apiDescription     Get files
 *
 * @apiVersion         1.0.0
 * @apiPermission      admin
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    "data": [
        {
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
        {
            "object": "File",
            "id": "krlg04dza6o3nw58",
            "path": "public/files/1530263447_2.png",
            "description": null,
            "created_at": {
                "date": "2018-06-29 09:10:47.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2018-06-29 09:21:00.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "real_id": 6
            },
        {
            "object": "File",
            "id": "g0ojyqdy8enmb5v3",
            "path": "public/files/1530263447_3.png",
            "description": null,
            "created_at": {
                "date": "2018-06-29 09:10:47.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2018-06-29 09:10:47.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "real_id": 7
        },
    }
}
 */

/** @var Route $router */
$router->get('files', [
    'as'         => 'api_file_get_all_files',
    'uses'       => 'Controller@getAllFiles',
    'middleware' => [
        'auth:api',
    ],
]);
