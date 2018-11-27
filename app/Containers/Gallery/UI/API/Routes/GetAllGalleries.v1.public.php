<?php

/**
 * @apiGroup           Gallery
 * @apiName            getAllGalleries
 *
 * @api                {GET} /v1/galleries Get galleries
 * @apiDescription     Fetch all items from gallery
 *
 * @apiVersion         1.0.0
 * @apiPermission      admin
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
    "data": [
        {
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
                        "path": "public/files/1530273873_1.png",
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
        }
    ],
    "meta": {
        "include": [
            "file"
        ],
        "custom": [],
        "pagination": {
            "total": 1,
            "count": 1,
            "per_page": 10,
            "current_page": 1,
            "total_pages": 1,
            "links": []
        }
    }
}
 */

/** @var Route $router */
$router->get('galleries', [
    'as'         => 'api_gallery_get_all_galleries',
    'uses'       => 'Controller@getAllGalleries',
    'middleware' => [
        'auth:api',
    ],
]);
