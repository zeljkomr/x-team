<?php

/**
 * @apiGroup           Gallery
 * @apiName            updateGallery
 *
 * @api                {PATCH} /v1/galleries/:id Update description
 * @apiDescription     Update picture description
 *
 * @apiVersion         1.0.0
 * @apiPermission      admin
 *
 * @apiParam           {String}  id (required)
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    "data": {
        "object": "Gallery",
        "id": "vaym0we8pdj7o4rz",
        "name": "aaaaaaaa",
        "description": "description must be at least 10 characters",
        "created_at": {
            "date": "2018-06-29 12:04:33.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_at": {
        "date": "2018-06-29 12:06:31.000000",
        "timezone_type": 3,
        "timezone": "UTC"
        },
        "real_id": 1,
        "file": {
            "data": [
                {
                    "object": "File",
                    "id": "vaym0we8pdj7o4rz",
                    "path": "public/files/1530273873_Screenshot at 2018-06-05 11-37-28.png",
                    "description": null,
                    "created_at": {
                        "date": "2018-06-29 12:04:33.000000",
                        "timezone_type": 3,
                        "timezone": "UTC"
                    },
                    "updated_at": {
                        "date": "2018-06-29 12:04:33.000000",
                        "timezone_type": 3,
                        "timezone": "UTC"
                    },
                    "real_id": 1
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
    'as'         => 'api_gallery_update_gallery',
    'uses'       => 'Controller@updateGallery',
    'middleware' => [
        'auth:api',
    ],
]);
