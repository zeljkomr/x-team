<?php

/**
 * @apiGroup           Skill
 * @apiName            deleteSkill
 *
 * @api                {put} /v1/skills/delete Delete skill
 * @apiDescription     Delete skill
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  id
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 204 No Content
 */

/** @var Route $router */
$router->put('skills/delete', [
    'as' => 'api_skill_delete_skill',
    'uses'  => 'Controller@deleteSkill',
    'middleware' => [
      'auth:api',
    ],
]);
