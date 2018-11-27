<?php

/**
 * @apiGroup           Skill
 * @apiName            findSkillById
 *
 * @api                {GET} /v1/skills/:id Find skill
 * @apiDescription     Find skill
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  id
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('skills/{id}', [
    'as' => 'api_skill_find_skill_by_id',
    'uses'  => 'Controller@findSkillById',
    'middleware' => [
      'auth:api',
    ],
]);
