<?php

/**
 * @apiGroup           Skill
 * @apiName            getAllSkills
 *
 * @api                {GET} /v1/skills Get skills
 * @apiDescription     Get skills
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('skills', [
    'as' => 'api_skill_get_all_skills',
    'uses'  => 'Controller@getAllSkills',
    'middleware' => [
      'auth:api',
    ],
]);
