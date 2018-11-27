<?php

/**
 * @apiGroup           Skills
 * @apiName            updateRate
 * @api                {patch} /v1/skills Update user's skill
 * @apiDescription     Update User's skill
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  skill_id (required)
 * @apiParam           {String}  scale (required)
 * @apiParam           {String}  comment (required)
 * @apiParam           {String}  started_at (required)
 *
 * @apiExample {json=../../../Documentation/JSONResponses/CreateSkill.json} apiSuccessExample Response JSON
 */

/** @var Route $router */
$router->patch('skills', [
    'as' => 'api_skill_update_skill',
    'uses'  => 'Controller@updateSkill',
    'middleware' => [
      'auth:api',
    ],
]);
