<?php

/**
 * @apiGroup           Gallery
 * @apiName            findGalleryById
 *
 * @api                {GET} /v1/galleries/:id Find gallery by id
 * @apiDescription     Find gallery items
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
        "object": "Gallery",
        "id": "vyk8b06axe3ngpwq",
        "name": "name",
        "description": "description",
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
                    "path": "public/files/1530275526_1.png",
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
$router->get('galleries/{id}', [
    'as'         => 'api_gallery_find_gallery_by_id',
    'uses'       => 'Controller@findGalleryById',
    'middleware' => [
        'auth:api',
    ],
]);
