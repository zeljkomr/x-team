<?php

/**
 * @apiGroup           Gallery
 * @apiName            createGallery
 *
 * @api                {POST} /v1/galleries Create gallery
 * @apiDescription     Create gallery
 *
 * @apiVersion         1.0.0
 * @apiPermission      admin
 *
 * @apiParam           {File}  files[] (required) Insert multiple images
 *
 * @apiParam           {String}  name (required) Gallery name
 *
 * @apiParam           {String}  description (required) Gallery description
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    "data": {
        "object": "Gallery",
        "id": "vyk8b06axe3ngpwq",
        "name": "asdadada",
        "description": "3aaaaaaaaaaaaaaaaaaaaaaaaa",
        "created_at": {
            "date": "2018-06-29 12:32:06.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
            "date": "2018-06-29 12:32:06.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "real_id": 12,
        "file": {
            "data": [
                {
                    "object": "File",
                    "id": "vyk8b06axe3ngpwq",
                    "path": "public/files/1530275526_Screenshot at 2018-06-05 11-37-28.png",
                    "description": null,
                    "created_at": {
                        "date": "2018-06-29 12:32:06.000000",
                        "timezone_type": 3,
                        "timezone": "UTC"
                    },
                    "updated_at": {
                        "date": "2018-06-29 12:32:06.000000",
                        "timezone_type": 3,
                        "timezone": "UTC"
                    },
                    "real_id": 12
                }
            ]
        }
    },
    "meta": {
        "include": [
            "file"
        ],
        "custom": []
    }
}
 */

/** @var Route $router */
$router->post('galleries', [
    'as'         => 'api_gallery_create_gallery',
    'uses'       => 'Controller@createGallery',
    'middleware' => [
        'auth:api',
    ],
]);
